<?php

App::uses('Folder', 'Utility');
//App::uses('phpThumb'.DS.'phpThumb', 'Vendor');
//App::import('Vendor', 'phpThumb', array('file' => 'phpThumb'.DS.'phpthumb.class.php'));
//App::import('Vendor', 'phpThumb/phpthumb.class');

App::import('Vendor', 'PhpthumbClass', array('file' => 'phpThumb' . DS . 'phpthumb.class.php'));

//include_once(APP.'Vendor'.DS.'phpThumb'.DS.'phpThumb.php');

class FileModelBehavior extends ModelBehavior {

    /**
     * Model-specific settings
     * @var array
     */
    public $settings = array();

    /**
     * Setup
     * @param unknown_type $model
     * @param unknown_type $settings
     */
    public function setup(&$Model, $settings) {
        //Folder for setting up permission
        //define();

        if (!isset($this->Folder)) {
            $this->Folder = new Folder();
        }
        //default settings
        if (!isset($this->settings[$Model->alias])) {
            $this->settings[$Model->alias] = array(
                'file_db_file' => array('filename'),
                'file_field' => array('file'),
                'dir' => array('uploads'),
                'overwrite' => 0,
                'custom_dir' => '',
                'use_model_name' => true,
                    //'thumbnail' => true
            );
        }
        $this->settings[$Model->alias] = array_merge(
                $this->settings[$Model->alias], (array) $settings
        );
    }

    //get file extention
    public function ext($file) {
        return mb_strtolower(trim(mb_strrchr($file, '.'), '.'));
    }

    private function reset($Model) {
        $this->dir = $this->settings[$Model->alias]['dir'];
        $this->file_db_file = $this->settings[$Model->alias]['file_db_file'];
        $this->file_field = $this->settings[$Model->alias]['file_field'];
        $this->uploads = array();
        $this->overwrite = $this->settings[$Model->alias]['overwrite'];
        $this->custom_dir = $this->settings[$Model->alias]['custom_dir'];

        for ($i = 0; $i < count($this->custom_dir); $i++) {
            $this->custom_dir[$i] = str_replace('/', DS, $this->custom_dir[$i]);
        }
        $this->use_model_name = $this->settings[$Model->alias]['use_model_name'];
    }

    //call back

    public function afterSave(&$Model, $created, $options) {
        //hold settings
        $this->reset($Model);
//        debug($Model->data);
        //callback only if there is a file attached
        if ($this->_hasUploads($Model)) {
            //debug('has Uploads');
            if ($this->use_model_name) {
                $name = $Model->alias;
            } else {
                $name = '';
            }

            //save
            if ($created) {
                $id = $Model->getLastInsertId();
                //update
            } else {
                //overwrite
                if ($this->overwrite) {
                    $oldFile = $Model->find('first', array('contain' => false,
                        'conditions' => array($Model->alias . "." . $Model->primaryKey => $Model->data[$Model->alias][$Model->primaryKey])));
                    //debug($oldFile);
                    //delete all of the old files
                    for ($i = 0; $i < sizeof($this->uploads); $i++) {
                        //$this->_delete($oldFile[$Model->alias][$this->file_db_file[$this->uploads[$i]]],$oldFile[$Model->alias][$Model->primaryKey],$this->uploads[$i]);
                        //debug($oldFile[$Model->alias][$this->file_db_file[$this->uploads[$i]]]);
                        //debug($oldFile[$Model->alias]['name']);
                        //debug($this->uploads[$i]);
                        //$this->_delete($oldFile[$Model->alias][$this->file_db_file[$this->uploads[$i]]],$oldFile[$Model->alias]['name'],$this->uploads[$i]);
                        $this->_delete($data[$Model->alias][$this->file_db_file[$i]], $id, $i);
                    }
                }
                $id = $Model->data[$Model->alias][$Model->primaryKey];
            }

            //upload files
            $uploadOk = true;
            //debug($this->uploads);
            for ($i = 0; $i < sizeof($this->uploads); $i++) {
                //get file name first
                $filename = $Model->data[$Model->alias][$this->file_field[$this->uploads[$i]]]['name'];
                $path = UPLOADS . $name . DS . $this->custom_dir[$this->uploads[$i]];
                //debug($path);
                $ext = $this->ext($filename);
                $fn = hash('md5', time() . $filename);
                $filename = $fn . '.' . $ext;
                while (file_exists($path . DS . $filename)) {
                    $ext = $this->ext($filename);
                    //$fn  = substr($filename, 0, strpos($filename, '.'));
                    $fn = hash('md5', time() . $filename);
                    //debug($ext.'  '.$fn);
                    $filename = $fn . '.' . $ext;
                }
                $thisUploadOk = $this->_upload($Model->data[$Model->alias][$this->file_field[$this->uploads[$i]]], $name, $id, $this->uploads[$i], $filename);
                $uploadOk = $uploadOk * $thisUploadOk;

                $thisThumbOk = false;
                if (isset($this->settings[$Model->alias]['thumbnail'])) {
                    $thumbnail = $this->settings[$Model->alias]['thumbnail'];

                    if (in_array(strtolower('.' . $ext), $thumbnail['allowed_extension'])) {
                        $thisThumbOk = $this->generateThumbnail($name, $id, $thumbnail['resize']['thumb'], $this->uploads[$i], $filename);
                    }

                    $uploadOk = $uploadOk * $thisThumbOk;
                }
//                if (isset($this->settings[$Model->alias]['encoded_sound'])) {
//                    $encoded_sound = $this->settings[$Model->alias]['encoded_sound'];
//                    if (in_array(strtolower('.' . $ext), $encoded_sound['allowed_extension'])) {
//                        $thisThumbOk = $this->generateEncodedSound($name, $id, null, 3, $filename);
//                    }
//                }
                //assign file name to updateModel
                $updateModel[$Model->alias][$Model->primaryKey] = $id;


                if (empty($this->custom_dir[$this->uploads[$i]])) {
                    $updateModel[$Model->alias][$this->file_db_file[$this->uploads[$i]]] = $filename;
                } else {
                    $updateModel[$Model->alias][$this->file_db_file[$this->uploads[$i]]] = $this->custom_dir[$this->uploads[$i]] . DS . $filename;
                    //debug($this->custom_dir[$this->uploads[$i]].DS.$filename);
                    if ($thisThumbOk) {
                        $updateModel[$Model->alias][$this->settings[$Model->alias]['thumbnail']['resize']['thumb']['field']] = $this->settings[$Model->alias]['thumbnail']['resize']['thumb']['directory'] . DS . $filename;
                    }
                }
            }

            if ($uploadOk) {
                return $this->_customizedSave($Model, $updateModel);
            } else {
                debug('Upload failed,please try again.');
                return false;
            }
        } else {
            return true;
        }
    }

    //call back
    public function beforeDelete(&$Model) {
        $this->reset($Model);

//        $data = $Model->read(null, $Model->id);
//        //debug($data);
//        if (!empty($data[$Model->alias]['id'])) {
//            if ($this->user_name) {
//                $name = $Model->data[$Model->alias]['name'];
//            } else {
//                App::import('Component', 'Session');
//                $this->Session = new SessionComponent();
//                $name = $this->Session->read('company_code');
//            }
//            for ($i = 0; $i < sizeof($this->file_db_file); $i++) {
//                //$this->_delete($data[$Model->alias][$this->file_db_file[$i]],$data[$Model->alias][$Model->primaryKey],$i);
//                if (strlen($data[$Model->alias][$this->file_db_file[$i]])) {
//                    $this->_delete($data[$Model->alias][$this->file_db_file[$i]], $data[$Model->alias]['id'], $i);
//                }
//            }
//        }
        return true;
    }

    //check if there is any uploads
    private function _hasUploads($Model) {
        //clear first
        unset($this->uploads);
        $this->uploads = array();
        for ($i = 0; $i < sizeof($this->file_field); $i++) {
            //debug($this->file_field[$i]);
            //debug($Model->data[$Model->alias][$this->file_field[$i]]);
            if (isset($Model->data[$Model->alias][$this->file_field[$i]]['size']) && $Model->data[$Model->alias][$this->file_field[$i]]['size'] != 0) {
                array_push($this->uploads, $i);
            }
        }
        if (sizeof($this->uploads) == 0) {
            return false;
        }
        return true;
    }

    private function _noUploads($Model) {
        for ($i = 0; $i < sizeof($this->file_field); $i++) {
            $Model->data[$Model->alias][$this->file_field[$i]]['size'] = 0;
        }
    }

    private function _delete($filedir, $name, $i) {
        //$path=WWW_ROOT.$this->dir[$dirIndex].DS.$id.DS.$filename;
        $path = UPLOADS . $name . DS . $filedir;
        //debug(!file_exists($filename));
        if (file_exists($path)) {
            //debug($path);
            clearstatcache();
            return unlink($path);
        } else {
            return false;
        }
    }

    private function _customizedSave(&$Model, $modelData) {
        //this will prevent it from calling the callback
        $this->_noUploads($Model);
        return $Model->save($modelData);
    }

    private function _upload($file, $name, $id, $i, $filename) {
        //debug($filename);
        if ($this->_validate($file)) {
            $des = $this->_createDir($name, $id, $i);
            //debug($des);
            $path = $des . DS . $file['name'];
            //debug($file);

            if (move_uploaded_file($file['tmp_name'], $des . DS . $filename)) {
                return true;
            } else if (copy($file['tmp_name'], $des . DS . $filename)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function _createDir($name, $id, $i) {
        if (empty($this->custom_dir[$i])) {
            $fullUploadDir = WWW_ROOT . $this->dir[$i] . DS . $name . DS . $id;
        } else {
            $fullUploadDir = UPLOADS . $name . DS . $id . DS . $this->custom_dir[$i];
        }

        //make sure the permission
        if (!is_dir($fullUploadDir)) {
            $this->Folder->create($fullUploadDir, 0777);
        } else if (!is_writable($fullUploadDir)) {
            $this->Folder->chmod($fullUploadDir, 0777, false);
        }
        return $fullUploadDir;
    }

    //give your own validation logic here
    private function _validate($file) {
        return true;
    }
/**
 * 
 * @param type $name
 * @param type $id
 * @param type $options
 * @param type $index
 * @param type $saveAs 
 * @return boolean
 * 
 */
    public function generateEncodedSound($name, $id, $options, $i, $saveAs) {
        try {
            $destination = UPLOADS . $name . DS . $id . DS . $options['directory']; //.DS.$saveAs;
            $source = UPLOADS . $name . DS . $id . DS . $this->custom_dir[$i] . DS . $saveAs;
            if (!is_dir($destination)) {
                $this->Folder->create($destination, 0777);
            } else if (!is_writable($destination)) {
                $this->Folder->chmod($destination, 0777, false);
            }
            $ext = substr(basename($saveAs), strrpos(basename($saveAs), '.') + 1);
            shurela_encode($source, $destination . DS . $saveAs);
            return true;
        } catch (Exception $ex) {
            return FALSE;
        }
    }

    public function generateThumbnail($name, $id, $options, $i, $saveAs) {
        //$destination = WWW_ROOT . $options['directory'] . DS . basename($saveAs);
        $destination = UPLOADS . $name . DS . $id . DS . $options['directory']; //.DS.$saveAs;
        $source = UPLOADS . $name . DS . $id . DS . $this->custom_dir[$i] . DS . $saveAs;
//        debug($source);

        if (!is_dir($destination)) {
            $this->Folder->create($destination, 0777);
        } else if (!is_writable($destination)) {
            $this->Folder->chmod($destination, 0777, false);
        }

        $ext = substr(basename($saveAs), strrpos(basename($saveAs), '.') + 1);
        if ($ext == '.jpg' || $ext == '.jpeg') {
            $format = 'jpeg';
        } elseif ($ext == 'png') {
            $format = 'png';
        } elseif ($ext == 'gif') {
            $format = 'gif';
        } else {
            $format = 'jpeg';
        }

        $phpThumb = new phpthumb();
        $phpThumb->setSourceFilename($source);
        $phpThumb->setCacheDirectory(CACHE);

        // lets see if we are going to reduce the height and width
        // we won't do it on a small image!
        $size = getimagesize($source);
        if ($size[0] > $options['width'] || !empty($options['phpThumb']['far'])) {
            $phpThumb->setParameter('w', $options['width']);
        }

        if ($size[1] > $options['height'] || !empty($options['phpThumb']['far'])) {
            $phpThumb->setParameter('h', $options['height']);
        }

        $phpThumb->setParameter('f', $format);

        if (!empty($options['phpThumb'])) {
            foreach ($options['phpThumb'] as $name => $value) {
                if (!empty($value)) {
                    $phpThumb->setParameter($name, $value);
                }
            }
        }

        if ($phpThumb->generateThumbnail()) {
            if ($phpThumb->RenderToFile($destination . DS . $saveAs)) {
                chmod($destination . DS . $saveAs, 0644);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

?>