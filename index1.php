<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="css/cssindex1.css">
</head>
<body>
<div class="row d-flex justify-content-center container">
    <div class="col-md-8">
        <div class="card-hover-shadow-2x mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="fa fa-tasks"></i>&nbsp;Task Lists</div>
            </div>
            <div class="scroll-area-sm">
                <perfect-scrollbar class="ps-show-limits">
                    <div style="position: static;" class="ps ps--active-y">
                        <div class="ps-content">
                            <ul class=" list-group list-group-flush">
                                <?php
                                require 'conn.php';
                                $query = $conn->query("SELECT * FROM `task` ORDER BY `task_id` ASC");
                                $count = 1;
                                while($fetch = $query->fetch_array()){
                                    ?>
                                <li class="list-group-item">
                                    <div class="todo-indicator bg-warning"></div>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-2">
                                                <?php
                                                    if ($fetch['status']=="Done"){
                                                        echo '<div class="custom-checkbox custom-control"> <input checked ="true" class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>';
                                                    }
                                                    else{
                                                        echo '<div class="custom-checkbox custom-control"> <input class="custom-control-input" id="exampleCustomCheckbox12" type="checkbox"><label class="custom-control-label" for="exampleCustomCheckbox12">&nbsp;</label> </div>';
                                                    }
                                                ?>
                                            </div>
                                            <div class="widget-content-left">
                                                <div class="widget-heading"><?php echo $fetch['task']?><div class="badge badge-danger ml-2"><?php echo $fetch['status']?></div>
                                                </div>
                                                <div class="widget-subheading"><i>By Bob</i></div>
                                            </div>
                                            <div class="widget-content-right">
                                                <?php
                                                if($fetch['status'] != "Done"){
                                                    echo
                                                        '<a href="update_task.php?task_id='.$fetch['task_id'].'" class="border-0 btn-transition btn btn-outline-success"> <i class="fa fa-check"></i></a> ';
                                                }
                                                ?>
                                                <a href="delete_query.php?task_id=<?php echo $fetch['task_id']?>" class="border-0 btn-transition btn btn-outline-danger"> <i class="fa fa-trash"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php
					                }
				                ?>
                            </ul>
                        </div>
                    </div>
                </perfect-scrollbar>
            </div>
            <div class="d-block text-right card-footer">
                <form method="POST" class="form-inline" action="add_query.php">
                    <input type="text" class="form-control" name="task"/>
                    <button class="btn btn-primary form-control" name="add">Add Task</button>
                </form>
            </div>
            <div class="d-block text-right card-footer"><button class="mr-2 btn btn-link btn-sm">Cancel</button></div>
        </div>
    </div>
</div>
</body>
</html>
