<?php
/**
 * Created by PhpStorm.
 * User: hebingsong
 * Date: 2017/8/24
 * Time: 下午2:49
 */


$inbox = imap_open("{pop3.126.com:110/pop3}", '*', '*');

$emails = imap_search($inbox,'ALL');


/* if emails are returned, cycle through each... */
if($emails) {

    /* begin output var */
    $output = '';

    /* put the newest emails on top */
    rsort($emails);

    /* for every email... */
    foreach($emails as $email_number) {

        //$email_number=$emails[0];
        //print_r($emails);
        /* get information specific to this email */
        $overview = imap_fetch_overview($inbox,$email_number,0);


        $message = imap_base64(imap_fetchbody($inbox,$email_number,2));


        /* output the email header information */
//        $output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
//        $output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
//        $output.= '<span class="from">'.$overview[0]->from.'</span>';
//        $output.= '<span class="date">on '.$overview[0]->date.'</span>';
//        $output.= '</div>';
//
//        /* output the email body */
//        $output.= '<div class="body">'.$message.'</div>';
    }

}

/* close the connection */
imap_close($inbox);

