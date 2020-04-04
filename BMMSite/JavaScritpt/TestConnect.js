var dataTable;
$(document).ready(function(){
                loadAccountList();
        });

        function loadAccountList() {

            $.ajax({
                /*url: "../srtdash/php_functions/account_list.php",
                type: "POST", 
                dataType: "JSON",
                data: {}, //this is data you send to your server*/
                    type: 'POST',
                    url: '..\BmmSite\php_action.Tsev.php',
                    dataType: 'json',
                    data: {},
                    contentType: 'application/json; charset=utf-8',
                success: function(res)
                {   
                        for (var i = 0; i < res.length; i++) {

                                var lst;

                                if (res[i]['status'] == 1 ){
                                    lst = '<h4><a href="#" class="badge badge-primary">Pending</a></h4>';
                                }else if (res[i]['status'] == 2 ){
                                    lst = '<h4><a href="#" class="badge badge-secondary">For Approval</a></h4>';
                                }else if (res[i]['status'] == 3 ) {
                                    lst = '<h4><a href="#" class="badge badge-success">For CAD</a></h4>';
                                }else if (res[i]['status'] == 4 ){
                                    lst = '<h4><a href="#" class="badge badge-danger">For Appraisal</a></h4>';
                                }else if (res[i]['status'] == 5 ){
                                    lst = '<h4><a href="#" class="badge badge-info">Release</a></h4>';
                                }

                          $('#tableBody').append('<tr><td hidden>' + res[i]['account_id'] 
                            + '</td><td>' + res[i]['PName'] 
                            + '</td><td>' + res[i]['account_name'] 
                            + '</td><td>' + res[i]['date_inspection'] 
                            + '</td><td>' + res[i]['date_report'] 
                            + '</td><td>' + res[i]['act_useof_prop'] 
                            + '</td><td>' + res[i]['landmark']
                            + '</td><td>' + res[i]['reg_owner']     
                            + '</td><td>' + lst
                            + '</td></tr>')
                        }
                }       
            });
    }