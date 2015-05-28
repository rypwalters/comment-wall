<?php
    // Spin through the comments
    foreach( $comments AS $oThisComment ) {
        // Icky table, but we're going for function first and refactor for form
        echo '<table border=1>';
        echo '<tr><td width="100px" rowspan="3">';

        // Did they give us an email address?
        if( strlen( $oThisComment->email ) ) {
            // Yep, so show thier gravatar
            $sGravatarHash = md5( strtolower( trim( $oThisComment->email ) ) );
            echo '<IMG SRC="http://www.gravatar.com/avatar/' . $sGravatarHash . '"></td><td>';
        }
        else {
            echo '</td><td>';
        }
        
        // Handle the name depending on the entry of an email for web address
        // How about a web site address?
        if( strlen( $oThisComment->website ) ) {
            echo '<a href="' . $oThisComment->website . '" target="_blank">' . $oThisComment->name . '</a> ';
        } 
        else if( strlen( $oThisComment->email ) ) {
            echo '<a href="mailto:' . $oThisComment->email . '">' . $oThisComment->name . '</a>';
            
        }
        else {
            echo $oThisComment->name;
        }
        
        // Clean the timestamp
        $tThisTime = strtotime( $oThisComment->date_created );
        $sThisDate = date( "m/d/y g:i A", $tThisTime );
        
        echo '</td></tr><tr><td>' . $oThisComment->comments . '</td></tr><tr><td>' . $sThisDate . '</td></tr>';
        
        echo '</table>';
    }
?>
