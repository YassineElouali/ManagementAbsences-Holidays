<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
} else
    header("location:../Interface/login.php");









include_once '../Classes/Employe.php';
include_once '../Services/EmployeService.php';
include_once '../Services/GradeService.php';



$a = new EmployeService();
$b = $a->getById($ide);




?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <script src="js/jquery/stat2.js" type="text/javascript"></script>
        <script src="js/amcharts_3.14.5.free/amcharts/amcharts.js"></script>
<script src="js/amcharts_3.14.5.free/amcharts/serial.js"></script>
<script src="js/amcharts_3.14.5.free/amcharts/themes/light.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Internet Dreams</title>
        <link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
        <!--[if IE]>
        <link rel="stylesheet" media="all" type="text/css" href="css/pro_dropline_ie.css" />
        <![endif]-->

        <!--  jquery core -->
        <script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!--  checkbox styling script -->
        <script src="js/jquery/ui.core.js" type="text/javascript"></script>
        <script src="js/jquery/ui.checkbox.js" type="text/javascript"></script>
        <script src="js/jquery/jquery.bind.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $('input').checkBox();
                $('#toggle-all').click(function () {
                    $('#toggle-all').toggleClass('toggle-checked');
                    $('#mainform input[type=checkbox]').checkBox('toggle');
                    return false;
                });
            });
        </script>  

        <![if !IE 7]>

        <!--  styled select box script version 1 -->
        <script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.styledselect').selectbox({inputClass: "selectbox_styled"});
            });
        </script>


        <![endif]>

        <!--  styled select box script version 2 --> 
        <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.styledselect_form_1').selectbox({inputClass: "styledselect_form_1"});
                $('.styledselect_form_2').selectbox({inputClass: "styledselect_form_2"});
            });
        </script>

        <!--  styled select box script version 3 --> 
        <script src="js/jquery/jquery.selectbox-0.5_style_2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.styledselect_pages').selectbox({inputClass: "styledselect_pages"});
            });
        </script>

        <!--  styled file upload script --> 
        <script src="js/jquery/jquery.filestyle.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function () {
                $("input.file_1").filestyle({
                    image: "images/forms/choose-file.gif",
                    imageheight: 21,
                    imagewidth: 78,
                    width: 310
                });
            });
        </script>

        <!-- Custom jquery scripts -->
        <script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

        <!-- Tooltips -->
        <script src="js/jquery/jquery.tooltip.js" type="text/javascript"></script>
        <script src="js/jquery/jquery.dimensions.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $('a.info-tooltip ').tooltip({
                    track: true,
                    delay: 0,
                    fixPNG: true,
                    showURL: false,
                    showBody: " - ",
                    top: -35,
                    left: 5
                });
            });
        </script> 


        <!--  date picker script -->
        <link rel="stylesheet" href="css/datePicker.css" type="text/css" />
        <script src="js/jquery/date.js" type="text/javascript"></script>
        <script src="js/jquery/jquery.datePicker.js" type="text/javascript"></script>
        <script type="text/javascript" charset="utf-8">
            $(function ()
            {

                // initialise the "Select date" link
                $('#date-pick')
                        .datePicker(
                                // associate the link with a date picker
                                        {
                                            createButton: false,
                                            startDate: '01/01/2005',
                                            endDate: '31/12/2020'
                                        }
                                ).bind(
                                        // when the link is clicked display the date picker
                                        'click',
                                        function ()
                                        {
                                            updateSelects($(this).dpGetSelected()[0]);
                                            $(this).dpDisplay();
                                            return false;
                                        }
                                ).bind(
                                        // when a date is selected update the SELECTs
                                        'dateSelected',
                                        function (e, selectedDate, $td, state)
                                        {
                                            updateSelects(selectedDate);
                                        }
                                ).bind(
                                        'dpClosed',
                                        function (e, selected)
                                        {
                                            updateSelects(selected[0]);
                                        }
                                );

                                var updateSelects = function (selectedDate)
                                {
                                    var selectedDate = new Date(selectedDate);
                                    $('#d option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                                    $('#m option[value=' + (selectedDate.getMonth() + 1) + ']').attr('selected', 'selected');
                                    $('#y option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
                                }
                                // listen for when the selects are changed and update the picker
                                $('#d, #m, #y')
                                        .bind(
                                                'change',
                                                function ()
                                                {
                                                    var d = new Date(
                                                            $('#y').val(),
                                                            $('#m').val() - 1,
                                                            $('#d').val()
                                                            );
                                                    $('#date-pick').dpSetSelected(d.asString());
                                                }
                                        );

                                // default the position of the selects to today
                                var today = new Date();
                                updateSelects(today.getTime());

                                // and update the datePicker to reflect it...
                                $('#d').trigger('change');
                            });
        </script>

        <!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
        <script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).pngFix( );
            });
        </script>
    </head>
    <body> 

        <!-- Start: page-top-outer -->
        <div id="page-top-outer">    

            <!-- Start: page-top -->
            <div id="page-top">

               

                <!--  start top-search -->
                <div id="top-search">
                    <table border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td><input type="text" value="Search" onblur="if (this.value == '') {
                                        this.value = 'Search';
                                    }" onfocus="if (this.value == 'Search') {
                                                this.value = '';
                                            }" class="top-search-inp" /></td>
                            <td>
                                <select  class="styledselect">
                                    <option value=""> All</option>
                                    <option value=""> Products</option>
                                    <option value=""> Categories</option>
                                    <option value="">Clients</option>
                                    <option value="">News</option>
                                </select> 
                            </td>
                            <td>
                                <input type="image" src="images/shared/top_search_btn.gif"  />
                            </td>
                        </tr>
                    </table>
                </div>
                <!--  end top-search -->
                <div class="clear"></div>

            </div>
            <!-- End: page-top -->

        </div>
        <!-- End: page-top-outer -->

        <div class="clear">&nbsp;</div>

        <!--  start nav-outer-repeat................................................................................................. START -->
        <div class="nav-outer-repeat"> 
            <!--  start nav-outer -->
            <div class="nav-outer"> 

                <!-- start nav-right -->
                <div id="nav-right">

                    <div class="nav-divider">&nbsp;</div>
                    <div class="showhide-account"><img src="images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" /></div>
                    <div class="nav-divider">&nbsp;</div>
                    <a href="Dec.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
                    <div class="clear">&nbsp;</div>

                    <!--  start account-content -->	
                    <div class="account-content">
                        <div class="account-drop-inner">
                            <a href="../UpdateForm/EmployeUpdate.php?id=<?php echo $ide; ?>&ide=<?php echo $ide; ?>" id="acc-settings">Settings</a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-details">Personal details </a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-project">Project details</a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-inbox">Inbox</a>
                            <div class="clear">&nbsp;</div>
                            <div class="acc-line">&nbsp;</div>
                            <a href="" id="acc-stats">Statistics</a> 
                        </div>
                    </div>
                    <!--  end account-content -->

                </div>
                <!-- end nav-right -->


                <!--  start nav -->
                <div class="nav">
                    <div class="table">

                        <ul class="current"><li><a href="Home.php?ide=<?php echo $ide;  ?>"><b>HOME</b><!--[if IE 7]><!--></a><!--<![endif]-->
                                <!--[if lte IE 6]><table><tr><td><![endif]-->


                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                        </ul>

                        <div class="nav-divider">&nbsp;</div>

                        <?php
                        $gra = new GradeService();
                        $typee = $gra->getById($b->getEg());


                        if ($typee->getLibelle() != "Employe") {
                            echo "<ul class=select ><li><a href=../list/Employelist.php?ide=" . $ide . "><b>EMPLOYE</b><!--[if IE 7]><!--></a><!--<![endif]-->

                            </li>
                        </ul>

                        <div class=nav-divider>&nbsp;</div>";

                            echo "<ul class=select><li><a href=../list/Gradelist.php?ide=" . $ide . "><b>GRADE</b><!--[if IE 7]><!--></a><!--<![endif]-->

                            </li>
                        </ul>

                        <div class=nav-outer>&nbsp;</div> ";

                            echo "<ul class=select><li><a href=../list/TypeCongelist.php?ide=" . $ide . "><b>TYPE CONGE</b><!--[if IE 7]><!--></a><!--<![endif]-->

                            </li>
                        </ul> ";

                            echo "<div class=nav-divider>&nbsp;</div>

                        <ul class=select><li><a href=../list/ServiceList.php?ide=" . $ide . "><b>SERVICE</b><!--[if IE 7]><!--></a><!--<![endif]-->

                            </li>
                        </ul>

                        <div class=nav-divider>&nbsp;</div>

                        <ul class=select><li><a href=#nogo><b>STATS</b><!--[if IE 7]><!--></a><!--<![endif]-->
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <div class=select_sub>
                                    <ul class=sub>
                                        <li><a href=../Interface/stat.php?ide=$ide>Statistiques 1</a></li>
                                        <li><a href=../Interface/stat2.php?ide=$ide>Statistiques 2</a></li>
                                        
                                    </ul>
                                </div>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                        </ul>";
                        }
                        ?>





                        <ul class="select"><li><a href="../list/Congelist.php?ide=<?php echo $ide; ?>"><b>CONGE</b><!--[if IE 7]><!--></a><!--<![endif]-->
                                <div class="select_sub">
                                    <ul class="sub">
                                        <li><a href="../list/Congelist.php?ide=<?php echo $ide; ?>">Demandes en attente</a></li>
                                        <li><a href="../list/Congelista.php?ide=<?php echo $ide; ?>">Congés Accepté</a></li>
                                        <li><a href="../list/Congelistr.php?ide=<?php echo $ide; ?>">Congés Refusé</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                        <div class="nav-divider">&nbsp;</div>





                        <ul class="select"><li><a href="../list/Absencelist.php?ide=<?php echo $ide; ?>"><b>ABSENCE</b><!--[if IE 7]><!--></a><!--<![endif]-->
                                <div class="select_sub">
                                    <ul class="sub">

                                        <li><a href="../list/Absencelista.php?ide=<?php echo $ide; ?>">Absences Justifié</a></li>
                                        <li><a href="../list/Absencelistr.php?ide=<?php echo $ide; ?>">Absences Non Justifié</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>



                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--  start nav -->

            </div>
            <div class="clear"></div>
            <!--  start nav-outer -->
        </div>
        <!--  start nav-outer-repeat................................................... END -->

        <div class="clear"></div>

        <!-- start content-outer ........................................................................................................................START -->
        <div id="content-outer">
            <!-- start content -->
            <div id="content">

                <!--  start page-heading -->
                <div id="page-heading">
                    <!-- <h1>Bonjour (Mr/Mme) :--> <?php

//echo $b->getNom()." ".$b->getPrenom();
?></h1>
                </div>
      <script>
                  
                      
                      
                     
                        
                        var ajax;
                        if (window.XMLHttpRequest)
                        {
                            ajax = new XMLHttpRequest();
                        }
                        else {
                            ajax = new ActiveXObject("Microsoft.XMLHTTP");
                        }

                          

                        ajax.open('GET', 'stat2nbr.php', true);
                        //ajax.setRequestHeader("content-type", "application/x-www-form-urlencoded");
                        //var postData = "lib="+str1;

                        ajax.send();

                        ajax.onreadystatechange = function ()
                        {
                            if (ajax.status == 200 && ajax.readyState == 4)
                            {
                                var objj = jQuery.parseJSON(ajax.responseText);
                                
                                stati(jQuery.parseJSON(ajax.responseText));
                            }
                        }

                    
                    





                </script>
                <fieldset><legend><h1>Le nombre d'absence par mois</h1></legend>
                    <div id="chartdiv"></div></fieldset>
<div class="container-fluid">
  <div class="row text-center" style="overflow:hidden;">
		
	</div>
</div>																	 

                <!-- end page-heading -->


                <div class="clear">&nbsp;</div>

            </div>
            <!--  end content -->
            <div class="clear">&nbsp;</div>
        </div>
        <!--  end content-outer........................................................END -->

        <div class="clear">&nbsp;</div>

        <!-- start footer -->         
        <div id="footer">
            <!-- <div id="footer-pad">&nbsp;</div> -->
            <!--  start footer-left -->
            <div id="footer-left">
                Admin Skin &copy; Copyright Internet Dreams Ltd. <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>
            <!--  end footer-left -->
            <div class="clear">&nbsp;</div>
        </div>
        <!-- end footer -->

    </body>
</html>