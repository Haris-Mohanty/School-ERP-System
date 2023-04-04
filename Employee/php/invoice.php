<?php

//link dompdf
require("../../dompdf/autoload.inc.php");

//LINK DATABASE
require_once("../../Common_files/php/database.php");

$enrollment = $_GET['enrollment'];
$name = $_GET['name'];
$category = $_GET['category'];
$course = $_GET['course'];
$batch = $_GET['batch'];
$fee_time = $_GET['fee-time'];
$paid_fee = $_GET['paid-fee'];
$date = $_GET['date'];
$pending = $_GET['pending'];
$recent = $_GET['recent'];

use Dompdf\Dompdf;

$x = new Dompdf();

$design = '

   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>
   <body>
       <h1 style="text-align: center; color: azure; background-color: rgb(149, 18, 210); font-family: Verdana, Geneva, Tahoma, sans-serif; letter-spacing: 0.8px;">Massachusetts Institute of Technology (MIT)</h1>
       <p style="text-align: center; font-size: 18px; font-family: monospace;">77 Massachusetts Ave, Cambridge, MA 02139, USA</p>
       <div style="width: 500px;">
           <b style="font-size: 20px;">Name : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$name.'</span><br><br>
           <b style="font-size: 20px;">Enrollment : </b>&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$enrollment.'</span><br><br>
           <b style="font-size: 20px;">Date : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$date.'</span><br><br>
           <b style="font-size: 20px;">Fee Time : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$fee_time.'</span><br><br>
           <b style="font-size: 20px;">Paid Fee : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>'.$paid_fee.'</span><br>
       </div><br><br>
       <table style="width: 100%; border: 2px solid rgb(149, 18, 210); border-collapse: collapse;">
           <thead style="background-color: rgb(149, 18, 210); color: aliceblue; font-family: Verdana, Geneva, Tahoma, sans-serif;border: 2px solid rgb(149, 18, 210);">
               <tr>
                   <td style="padding: 5px; text-align: center;">S/N</td>
                   <td style="padding: 5px; text-align: center;">Category</td>
                   <td style="padding: 5px; text-align: center;">Course</td>
                   <td style="padding: 5px; text-align: center;">Batch</td>
                   <td style="padding: 5px; text-align: center;">Pending Amount</td>
                   <td style="padding: 5px; text-align: center;">Recent Paid</td>
               </tr>
           </thead>
           <tbody style="font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;border: 2px solid rgb(149, 18, 210);">
               <tr>
                   <td style="text-align: center; padding: 5px;border: 2px solid rgb(149, 18, 210);">1</td>
                   <td style="text-align: center; padding: 5px;border: 2px solid rgb(149, 18, 210);">'.$category.'</td>
                   <td style="text-align: center; padding: 5px;border: 2px solid rgb(149, 18, 210);">'.$course.'</td>
                   <td style="text-align: center; padding: 5px;border: 2px solid rgb(149, 18, 210);">'.$batch.'</td>
                   <td style="text-align: center; padding: 5px;border: 2px solid rgb(149, 18, 210);">'.$pending.'</td>
                   <td style="text-align: center; padding: 5px;border: 2px solid rgb(149, 18, 210);">'.$recent.'</td>
               </tr>
           </tbody>
       </table>

       <h3 style="font-family: Georgia, "Times New Roman", Times, serif;">TTERMS & CONDITIONS:-</h3>

       <P style="font-family: cursive;">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, ratione? Reiciendis temporibus maxime porro officia saepe pariatur quibusdam nemo libero possimus amet necessitatibus minus, molestiae recusandae nulla. Vero odio reiciendis itaque voluptatem quam harum maiores ullam vel ab minima recusandae dolorum dicta fuga aspernatur repellat temporibus doloremque, eveniet modi numquam. Obcaecati, error magni molestias id vero, dignissimos perferendis enim adipisci alias unde consectetur dolorum maiores officiis facilis tenetur ab? Totam praesentium numquam rerum quis? Distinctio, doloribus voluptate laboriosam, dolor neque ipsum aperiam minima et omnis ab tempora hic aliquam quaerat quis dolore eveniet tempore corrupti eaque, ullam vel repudiandae ratione amet eos? Culpa tenetur ratione dignissimos! Non dolore facere perferendis, cum doloremque provident sit a unde pariatur consequuntur molestias? Voluptate temporibus maiores quis modi tenetur ducimus tempora atque unde reiciendis officia. Ipsum, aperiam officiis. Saepe esse officia temporibus quo nobis. Eum perferendis a deserunt autem laborum deleniti consectetur accusamus quibusdam vitae quaerat voluptate quos magni doloremque ipsa debitis, odio atque? Asperiores labore consequuntur libero error velit dicta iste officiis corrupti repellat accusamus non numquam incidunt modi, sint animi facilis ex voluptatem facere nesciunt aperiam natus veritatis voluptatum ipsum. Provident fugiat iste officia, vero ut dolore inventore laudantium ex porro eum dolorem perspiciatis odio rerum rem, tenetur nisi corrupti, fuga veniam assumenda atque quia molestiae dolor quasi? Rem autem eaque ea! Porro excepturi ullam sed? Aperiam unde alias dignissimos aliquid, iure quasi quibusdam ea hic et nihil nam, dicta explicabo saepe accusantium cumque veritatis eum eius?</P>
   </body>
   </html>

';

$x -> LoadHtml($design);
$x -> setPaper('A4', 'portrait');
$x -> render();

$x -> stream();

?>