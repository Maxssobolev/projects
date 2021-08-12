<?php

   function create_issue($data)
    {
        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Basic  $user ",
        ));

        curl_setopt($ch, CURLOPT_URL, 'https://jira.aiggroup.ru/rest/api/2/issue');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

   function add_file_issue($attach_files, $issue_id)
    {

        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic  $user ",
            "X-Atlassian-Token: nocheck",
        ));

        curl_setopt($ch, CURLOPT_URL, "https://jira.aiggroup.ru/rest/api/2/issue/$issue_id/attachments");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $attach_files);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	
	
   function create_comment($comment, $issue_key)
    {
        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic  $user ",
            "X-Atlassian-Token: nocheck",
            "Content-Type: application/json",
        ));

        curl_setopt($ch, CURLOPT_URL, "https://jira.aiggroup.ru/rest/api/2/issue/$issue_key/comment");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $comment);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
	
		
   function get_issue($issue_id)
    {
        $user = 'amlyYUBtaWNyb2tsYWQucnU6TWljcm9rbGFkMjAxNg==';
        $ch = curl_init('');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic  $user ",
            "X-Atlassian-Token: nocheck",
            "Content-Type: application/json",
        ));

        curl_setopt($ch, CURLOPT_URL, "https://jira.aiggroup.ru/rest/api/2/issue/$issue_id");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

?>