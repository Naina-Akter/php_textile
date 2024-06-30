<?php
              $folder="views/layout/menus";
              include("{$folder}/dashboard_menu.php");
              include("{$folder}/inventory_menu.php");
              include("{$folder}/customer_menu.php");
              include("{$folder}/purchase_menu.php");
              include("{$folder}/production_menu.php");
              include("{$folder}/distribution_menu.php");
              include("{$folder}/order_menu.php");
              


              foreach (glob("{$folder}/*_menu.php") as $filename)
              {
                if($filename=="{$folder}/dashboard_menu.php")continue;
                if($filename=="{$folder}/inventory_menu.php")continue;
                if($filename=="{$folder}/customer_menu.php")continue;
                if($filename=="{$folder}/purchase_menu.php")continue;
                if($filename=="{$folder}/production_menu.php")continue;
                if($filename=="{$folder}/distribution_menu.php")continue;
                if($filename=="{$folder}/order_menu.php")continue;
                  include $filename;
              }
          
          ?>