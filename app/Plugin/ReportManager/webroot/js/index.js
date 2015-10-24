
$(document).ready(function() {
    $('#ReportManagerModel').change(function(){
        if ( $(this).val() != '' ) {
            $.ajax({
            type: "POST",
            url: firstLevel+"report_manager/reports/ajaxGetOneToManyOptions",
            dataType: 'text',
            data: "model=" + $(this).val(),
            success: function(oneToManyOptions){
                $('#ReportManagerOneToManyOptionSelect').html(oneToManyOptions);
            },
            error: function(msg) { 
                $('#ReportManagerOneToManyOptionSelect').html('< Ajax Error >');
            }
            });    
        }        
    });    
    
    $('.deleteReport2').click(function(){
        var report = $('#ReportManagerSavedReportOption').val();
        if ( report != '' && confirm('Are you sure you want to delete '+report+'?')) {
            $.ajax({
            type: "POST",
            url: firstLevel+"report_manager/reports/deleteReport/"+report,
            dataType: 'text',
            success: function(reportList){
                $('#ReportManagerSavedReportOptionContainer').html(reportList);
            },
            error: function(msg) { 
                $('#ReportManagerSavedReportOptionContainer').html('< Ajax Error >');
            }
            });    
        }        
    });      
    
});