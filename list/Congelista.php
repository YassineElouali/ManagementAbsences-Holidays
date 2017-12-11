<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();

if (isset($_SESSION['ide'])) {
    extract($_GET);
    if ($_SESSION['ide'] != $ide)
        header("location:../Interface/login.php");
} else
    header("location:../Interface/login.php");


include_once '../Services/GradeService.php';
include_once '../Services/EmployeService.php';

$a=new EmployeService();
$b=$a->getById($ide);

?>

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>


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

                <!-- start logo -->
                <div id="logo">
                    <a href=""><img src="images/shared/logo.png" width="156" height="40" alt="" /></a>
                </div>
                <!-- end logo -->

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
                    <a href="../Interface/Dec.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a>
                    <div class="clear">&nbsp;</div>

                    <!--  start account-content -->	
                    <div class="account-content">
                        <div class="account-drop-inner">
                            <a href="" id="acc-settings">Settings</a>
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

                        <ul class="current"><li><a href="../Interface/Home.php?ide=<?php echo $ide;  ?>"><b>HOME</b><!--[if IE 7]><!--></a><!--<![endif]-->
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
                </div> <!-- end nav -->

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
                    <h1>Liste des Congés :</h1>
                </div>
                <!-- end page-heading -->

                <table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
                    <tr>
                        <th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
                        <th class="topleft"></th>
                        <td id="tbl-border-top">&nbsp;</td>
                        <th class="topright"></th>
                        <th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
                    </tr>
                    <tr>
                        <td id="tbl-border-left"></td>
                        <td>
                            <!--  start content-table-inner ...................................................................... START -->
                            <div id="content-table-inner">

                                <!--  start table-content  -->
                                <div id="table-content">


                                    <?php
                                    if (isset($_GET['delete']))
                                    /* Suppression */ {
                                        echo "<div id=message-red style=visibility:visible>";
                                        echo "<table border=0 width=100% cellpadding=0 cellspacing=0>
                                            <tr>
                                                <td class=red-left >Congé supprimé avec succes !! </td>
                                                <td class=red-right ><a class=close-red><img src=images/table/icon_close_red.gif   alt= /></a></td>
                                            </tr>
                                        </table>
                                    </div>";
                                    }
                                    // <!--  end message-red -->
                                    // <!--  start message-green -->
                                    if (isset($_GET['add'])) {
                                        echo "<div id=message-green style=visibility:visible>";
                                        echo "<table border=0 width=100% cellpadding=0 cellspacing=0>
                                            <tr>

                                                <td class=green-left id=succes >Congé ajouter avec succes !!</td>
                                                <td class=green-right><a class=close-green><img src=images/table/icon_close_green.gif   alt= /></a></td>

                                            </tr>
                                        </table>
                                    </div>";
                                    }
                                    // <!--  end message-green -->
                                    //<!--  start message-yellow -->
                                    if (isset($_GET['update'])) {
                                        echo "<div id=message-yellow>";
                                        echo" <table border=0 width=100% cellpadding=0 cellspacing=0>
                                            <tr>
                                                <td class=yellow-left>Grade Modifier avec Succes !!. </td>
                                                <td class=yellow-right><a class=close-yellow><img src=images/table/icon_close_yellow.gif   alt= /></a></td>
                                            </tr>
                                        </table>
                                    </div>";
                                    }
                                    //<!--  end message-yellow -->
                                    ?>
                                   


                                    <!--  start product-table ..................................................................................... -->
                                    <form id="mainform" action="">
                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">




                                            <tr>
                                                <th class="table-header-check"><a id="toggle-all" ></a> </th> 
                                             <!--   <th class="table-header-repeat line-left minwidth-1"><a href="">Conge id</a>	</th>-->
                                                <th class="table-header-repeat line-left minwidth-1"><a href="">Employe </a></th>
                                                <th class="table-header-repeat line-left minwidth-1"><a href="">Type du conge  </a></th>
                                                <th class="table-header-repeat line-left minwidth-1"><a href="">Jour debut</a></th>
                                                <th class="table-header-repeat line-left minwidth-1"><a href="">Jour fin</a></th>
                                                <th class="table-header-repeat line-left minwidth-1"><a href="">Etat</a></th>
                                                <th class="table-header-repeat line-left minwidth-1"><a href="">Effectue le</a></th>
                                                <?php
                                                include_once '../Services/CongeService.php';
                                            include_once '../Services/TypeCongeService.php';
                                            include_once '../Services/EmployeService.php';
                                            include_once '../Services/GradeService.php';


                                            $a = new CongeService();
                                            $b = new TypeCongeService();
                                            $e = new EmployeService();
                                            // $t = array();
                                            // $t = $a->getAllByid($ide);
                                            $e = new EmployeService();
                                            $f = $e->getById($ide);
                                            $grade = new GradeService();
                                            $ga = $grade->getById($f->getEg());
                                                
                                               
                                                ?>
                                            </tr>




                                            <?php
                                            

                                            if ($ga->getLibelle() != "Employe") {
                                                $t = $a->getAll();
                                            } else {
                                                $t = $a->getAllByid($ide);
                                            }
                                            $i = 0;
                                            foreach ($t as $key => $v) {
                                                if($v->getEtat()=="Accepter" ){
                                                echo"<tr>";
                                                echo "<td><input type=checkbox name=check></td>";
                                                // echo"<td>" . $v->getId() . "</td>";
                                                $c = $e->getById($v->getIde());
                                                echo"<td>" . $c->getNom() . " " . $c->getPrenom() . "</td>";
                                                $c = $b->getById($v->getType());
                                                echo"<td>" . $c->getLibelle() . "</td>";
                                                echo"<td>" . $v->getJdebut() . "</td>";
                                                echo"<td>" . $v->getJfin() . "</td>";
                                                echo"<td>" . $v->getEtat() . "</td>";
                                                echo"<td>" . $v->getDdc() . "</td>";
                                              echo "</tr>";}
                                                $i++;
                                            }
                                            ?>








                                        </table>
                                        <!--  end product-table................................... --> 
                                    </form>
                                </div>
                                <!--  end content-table  -->

                                <!--  start actions-box ............................................... -->
                                <div id="actions-box">
                                    <a href="" class="action-slider"></a>
                                    <div id="actions-box-slider">
                                        <a href="../Formulaire/CongeForm.php?ide=<?php echo $ide; ?>" class="action-edit">Ajouter</a>

                                        <a href="" class="action-delete">Supprimer</a>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <!-- end actions-box........... -->

                                <!--  start paging..................................................... -->

                                <!--  end paging................ -->

                                <div class="clear"></div>

                            </div>
                            <!--  end content-table-inner ............................................END  -->
                        </td>
                        <td id="tbl-border-right"></td>
                    </tr>
                    <tr>
                        <th class="sized bottomleft"></th>
                        <td id="tbl-border-bottom">&nbsp;</td>
                        <th class="sized bottomright"></th>
                    </tr>
                </table>
                <div class="clear">&nbsp;</div>

            </div>
            <!--  end content -->
            <div class="clear">&nbsp;</div>
        </div>
        <!--  end content-outer........................................................END -->

        <div class="clear">&nbsp;</div>

        <!-- start footer -->         
        <div id="footer">
            <!--  start footer-left -->
            <div id="footer-left">

                Admin Skin &copy; Copyright Internet Dreams Ltd. <span id="spanYear"></span> <a href="">www.netdreams.co.uk</a>. All rights reserved.</div>
            <!--  end footer-left -->
            <div class="clear">&nbsp;</div>
        </div>
        <!-- end footer -->

    </body>
</html>