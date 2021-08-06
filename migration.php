<?php



require __DIR__."/database.php";

function template_msg($file_name, $icon, $msg){
    
    $color = ($icon == 'Success') ? "style='color:#05E200'" : "style='color:#E22900'";
    $icon_frame =  ($icon == 'Success') ? "style='color:#05E200;border-radius: .55rem; padding: 10px; background-color:#D0FFD5'" : "style='color:#E22900;border-radius: .55rem; padding: 10px; background-color:#FFE9E9'";
    return "
        <p style='margin-bottom:10px'><h3>Simple MySQL Migration - By Adan Aidan Teras</h3></p>
        <style>
            .table tr {
                vertical-align:top;
                margin-bottom: 5px;
            }
        </style>
        <table cellspacing='0' cellpadding='10px' class='table'>
            <tr>
                <td>Migration For </td>
                <td>:</td>
                <td>{$file_name}</td>
            </tr>
            <tr>
                <td>Status </td>
                <td>:</td>
                <td {$color}><span {$icon_frame}> {$icon}</span></td>
            </tr>
            <tr>
                <td>Message </td>
                <td>:</td>
                <td>
                    <pre style='background-color:#E4E4E4; border-radius: .55rem; padding:10px'>{$msg}</pre>
                </td>
            </tr>
        </table>
        <hr>
    "; 

}

function exec_qry($kon, $file_name){

    $sql = file_get_contents($file_name);
    if ($kon->multi_query($sql) === TRUE) { 
        echo template_msg($file_name, "Success", "Migration Success For : {$file_name}");
        echo '

        <h3><a href="index.php">Go To Cipa -  City Parking</a></h3>

        <hr>


        
        <h3>Documentation : </h3><iframe src="documentation/doc_cipa.pdf" width="100%" height="800" style="margin-top:10px; border:1px solid #C8C8C8"></iframe>';
    }else{
        echo template_msg($file_name, "Failed", "{$kon->error}");
    }
}


$qr = exec_qry($kon, "database/cipa.sql");

