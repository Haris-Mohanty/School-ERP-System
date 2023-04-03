<?php

//link dompdf
require("../../dompdf/autoload.inc.php");

//LINK DATABASE
require_once("../../Common_files/php/database.php");

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
        <h1 style="text-align: center; color: azure; background-color: red;">Massachusetts Institute of Technology (MIT)</h1>
        <p style="text-align: center; font-size: 18px;">77 Massachusetts Ave, Cambridge, MA 02139, USA</p>
        <div style="width: 500px;">
            <b>Name : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;`<span>1415545</span><br><br>
            <b>Enrollment : </b>&nbsp;&nbsp;&nbsp;&nbsp;<span>1415545</span><br><br>
            <b>Date : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>1415545</span><br><br>
            <b>Fee Time : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>1415545</span><br><br>
            <b>Paid Fee : </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>1415545</span><br>
        </div><br><br>
        <table style="width: 100%; border: 2px solid red;">
            <thead>
                <tr>
                    <td style="padding: 5px; text-align: center;">S/N</td>
                    <td style="padding: 5px; text-align: center;">Category</td>
                    <td style="padding: 5px; text-align: center;">Course</td>
                    <td style="padding: 5px; text-align: center;">Batch</td>
                    <td style="padding: 5px; text-align: center;">Pending Amount</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center; padding: 5px;">1</td>
                    <td style="text-align: center; padding: 5px;">MCA</td>
                    <td style="text-align: center; padding: 5px;">PHP</td>
                    <td style="text-align: center; padding: 5px;">New Batch</td>
                    <td style="text-align: center; padding: 5px;">1244</td>
                </tr>
            </tbody>
        </table>
        <h3>TTERMS & CONDITIONS:-</h3>
        <P>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore, ratione? Reiciendis temporibus maxime porro officia saepe pariatur quibusdam nemo libero possimus amet necessitatibus minus, molestiae recusandae nulla. Vero odio reiciendis itaque voluptatem quam harum maiores ullam vel ab minima recusandae dolorum dicta fuga aspernatur repellat temporibus doloremque, eveniet modi numquam. Obcaecati, error magni molestias id vero, dignissimos perferendis enim adipisci alias unde consectetur dolorum maiores officiis facilis tenetur ab? Totam praesentium numquam rerum quis? Distinctio, doloribus voluptate laboriosam, dolor neque ipsum aperiam minima et omnis ab tempora hic aliquam quaerat quis dolore eveniet tempore corrupti eaque, ullam vel repudiandae ratione amet eos? Culpa tenetur ratione dignissimos! Non dolore facere perferendis, cum doloremque provident sit a unde pariatur consequuntur molestias? Voluptate temporibus maiores quis modi tenetur ducimus tempora atque unde reiciendis officia. Ipsum, aperiam officiis. Saepe esse officia temporibus quo nobis. Eum perferendis a deserunt autem laborum deleniti consectetur accusamus quibusdam vitae quaerat voluptate quos magni doloremque ipsa debitis, odio atque? Asperiores labore consequuntur libero error velit dicta iste officiis corrupti repellat accusamus non numquam incidunt modi, sint animi facilis ex voluptatem facere nesciunt aperiam natus veritatis voluptatum ipsum. Provident fugiat iste officia, vero ut dolore inventore laudantium ex porro eum dolorem perspiciatis odio rerum rem, tenetur nisi corrupti, fuga veniam assumenda atque quia molestiae dolor quasi? Rem autem eaque ea! Porro excepturi ullam sed? Aperiam unde alias dignissimos aliquid, iure quasi quibusdam ea hic et nihil nam, dicta explicabo saepe accusantium cumque veritatis eum eius?</P>
    </body>
    </html>
';

$x -> loadHtml($design);
$x -> setPaper('A4', 'portrait');
$x -> render();

$x -> stream();

?>