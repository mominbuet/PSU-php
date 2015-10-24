<?php

/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php echo $pluralHumanName; ?>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $action. ' '.$pluralHumanName; ?>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
<?php echo "<?php echo \$this->Form->create('{$modelClass}',array('class'=>'form-horizontal', 'role'=>'form')); ?>\n"; ?>


<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field === $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
                            echo 'echo "<div class=\"form-group\"> <label>'.$field.'</label>";';
                           
			echo "\t\techo \$this->Form->input('{$field}',array('label' => false,'class' => 'form-control'));\n\t\techo '</div>';\n";
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
                            echo 'echo "<div class=\"form-group\"> <label>'.$assocName.'</label>";';
                           
                            echo "\t\techo \$this->Form->input('{$assocName}',array('label' => false,'class' => 'form-control'));\n\t\techo '</div>';\n";
			}
		}
		echo "\t?>\n";
?>
<?php
echo '<input type="submit" class="fa fa-plus btn btn-success" value="Add/Edit"/> </form>';

	//echo "<?php echo \$this->Form->end(__('Submit')); \n";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
</div>
<div class="actions">
    <h3><?php echo "<?php echo __('Actions'); ?>"; ?></h3>
    <ul>

<?php if (strpos($action, 'add') === false): ?>
        <li><?php echo "<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), array(), __('Are you sure you want to delete # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>"; ?></li>
<?php endif; ?>
        <li><?php echo "<?php echo \$this->Html->link(__('List " . $pluralHumanName . "'), array('action' => 'index')); ?>"; ?></li>
<?php
		$done = array();
		foreach ($associations as $type => $data) {
			foreach ($data as $alias => $details) {
				if ($details['controller'] != $this->name && !in_array($details['controller'], $done)) {
					echo "\t\t<li><?php echo \$this->Html->link(__('List " . Inflector::humanize($details['controller']) . "'), array('controller' => '{$details['controller']}', 'action' => 'index')); ?> </li>\n";
					echo "\t\t<li><?php echo \$this->Html->link(__('New " . Inflector::humanize(Inflector::underscore($alias)) . "'), array('controller' => '{$details['controller']}', 'action' => 'add')); ?> </li>\n";
					$done[] = $details['controller'];
				}
			}
		}
?>
    </ul>
</div>
