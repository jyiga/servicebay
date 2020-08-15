<?php
//session_start();
/**
 * Created by PhpStorm.
 * User: james
 * Date: 2/28/2017
 * Time: 4:03 AM
 */
class Menu
{

    //This is the 
    public static  function sideMenu()
    {
        $conn=new SqlExecutor();

        //$_SESSION['userId']="{72231F4C-9219-C75B-6EEA-AB15A3B4DE84}";
        if(isset($_SESSION['userId'])) {


            $userId = $_SESSION['userId'];
            $sql = "select * from activity where isActive='1' order by indexOrder";
            //$str='<li><a href="admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>';
            $str = '<h3>General</h3>
                        <ul class="nav side-menu" id="menu-link"><li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a><ul class="nav child_menu"><li><a href="../dashboard/index">Dashboard</a></li></ul></li>';
            foreach ($conn->getResultSet($sql) as $row) {
                //check role
                $id = $row['id'];
                $sqlInner2 = "select * from  subactivity sa inner join rolemanagement rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";

                $nox = $conn->sqlCount($sqlInner2);
                if ($nox > 0) {
                    $str .= '<li>';
                    $str .= '<a><i class="fa fa-folder-o"></i>' . $row['name'] . '<span class="fa fa-chevron-down"></span></a>';

                    $str .= '<ul class="nav child_menu">';
                    $sqlInner = "select * from  subactivity sa inner join rolemanagement rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";
                    $strInner = "";
                    foreach ($conn->getResultSet($sqlInner) as $rowInner)
                    {
                        $strInner .= '<li><a href="' . $rowInner['link'] . '">' . $rowInner['name'] . '</a></li>';
                    }
                    $strInner .= '</ul></li>';
                    $str .= $strInner;
                }
            }
            $str . "</li></ul>";
            return $str;
        }else{

        }
        //$this->set('htmlString',$str);
        //$sql="select sa.*,a.name nameActivity from  tblsubactivity sa inner join tblactivity a on sa.activityId=a.id";
        //return $this->con->getResultSet($sql);
    }

    //This is the 
    public static  function sideMenuMaterial()
    {
        $conn=new SqlExecutor();

        //$_SESSION['userId']="{72231F4C-9219-C75B-6EEA-AB15A3B4DE84}";
        if(isset($_SESSION['userId'])) {


            $userId = $_SESSION['userId'];
            $sql = "select * from activity where isActive='1' order by indexOrder";
            //$str='<li><a href="admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>';
            $str = '';
            foreach ($conn->getResultSet($sql) as $row) {
                //check role
                $id = $row['id'];
                $sqlInner2 = "select * from  subactivity sa inner join rolemanagement rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";

                $nox = $conn->sqlCount($sqlInner2);
                if ($nox > 0) {
                    $str .= '<li>';
                    $str .= '<a href="javascript:void(0)" class="menu-toggle"><i class="material-icons">widgets</i><span>' . $row['name'] . '</span></a>';

                    $str .= '<ul class="ml-menu">';
                    $sqlInner = "select * from  subactivity sa inner join rolemanagement rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";
                    $strInner = "";
                    foreach ($conn->getResultSet($sqlInner) as $rowInner)
                    {
                        $strInner .= '<li><a href="' . $rowInner['link'] . '">' . $rowInner['name'] . '</a></li>';
                    }
                    $strInner .= '</ul></li>';
                    $str .= $strInner;
                }
            }
            //$str . "</li></ul>";
            return $str;
        }else{

        }
        //$this->set('htmlString',$str);
        //$sql="select sa.*,a.name nameActivity from  tblsubactivity sa inner join tblactivity a on sa.activityId=a.id";
        //return $this->con->getResultSet($sql);
    }


    public static  function dasbboardmenu()
    {
        $conn=new SqlExecutor();

        //$_SESSION['userId']="{72231F4C-9219-C75B-6EEA-AB15A3B4DE84}";
        if(isset($_SESSION['userId'])) {


            $userId = $_SESSION['userId'];
            $sql = "select * from activity where isActive='1' order by indexOrder";
            //$str='<li><a href="admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>';
            $str = '<h3>Dashboard</h3>';

            foreach ($conn->getResultSet($sql) as $row)
            {
                //check role
                $id = $row['id'];
                $sqlInner2 = "select * from  subactivity sa inner join rolemanagement rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";

                $nox = $conn->sqlCount($sqlInner2);
                if ($nox > 0) {
                    $str .= '<div class="col-lg-12 icon-and-text-button-demo">';
                    $str .= '<h4 style="border-bottom:1px solid #ff6ba2; ">' . $row['name'] . '</h4>';
                    //$str .= '<button type="button" class="btn btn-primary waves-effect">';

                    //$str .= '<ul class="nav child_menu">';
                    $sqlInner = "select * from  subactivity sa inner join rolemanagement rm on rm.roleId=sa.id where sa.activityId='$id' and sa.isActive='1' and rm.userId='$userId' order by orderIndex ";
                    $strInner = "";
                    $i=1;
                    foreach ($conn->getResultSet($sqlInner) as $rowInner)
                    {
                        $icon=null;
                            if($rowInner['icon']==null)
                            {
                                $icon='<i class="fa fa-cog fa-2x"></i>';
                            }else
                            {
                               $icon= '<i class="'.$rowInner['icon'].'"></i>';
                            }

                        /*if($i==0)
                        {*/

                            $strInner .= 
                            '<a href="' . $rowInner['link'] . '" class="btn btn-primary" role="button" style="display: inline-block; margin: 2px; padding: 10px 12px" >' .$icon. ' &nbsp&nbsp'.$rowInner['name'] .'</a>';

                            // '<button type="button" class="btn btn-primary waves-effect">
                            // <a href="' . $rowInner['link'] . '" class="btn btn-primary"  >' .$icon. '</a><span>'.$rowInner['name'] .'</span></button>';
                            $i=$i+1;
                        /*}else if($i<4){
                            $strInner .= '<a href="' . $rowInner['link'] . '" class="btn btn-app" >' .$icon. $rowInner['name'] . '</a>';
                            $i=$i+1;
                        }else{*/

                            //$strInner .= '<a href="' . $rowInner['link'] . '" class="btn btn-app" >' .$icon. $rowInner['name'] . '</a>';
                            //$i=0;
                        //}

                    }
                    $strInner .= '</div>';
                    $str .= $strInner;
                }
            }
            $str . "";
            return $str;
        }else{

        }
        //$this->set('htmlString',$str);
        //$sql="select sa.*,a.name nameActivity from  tblsubactivity sa inner join tblactivity a on sa.activityId=a.id";
        //return $this->con->getResultSet($sql);
    }
}