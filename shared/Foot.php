<style>
    /* footer */

    header p {
        padding: 50px;
        text-align: center;
        color: #bebebe;
        text-transform: uppercase;
        font-size: 65px;
        font-weight: 700;
    }

    .footer {
        display: flex;
        flex-flow: row wrap;
        padding: 50px;
        color: var(--red);
        background-color: var(--black);
    }

    .footer>* {
        flex: 1 100%;
    }

    h2 {
        font-weight: 400;
        font-size: 15px;
    }

    .footer ul {
        list-style: none;
        padding-left: 0;
    }

    .footer li {
        line-height: 2em;
    }

    .footer a {
        text-decoration: none;
    }

    .r-footer {
        display: flex;
        flex-flow: row wrap;
    }

    .r-footer>* {
        flex: 1 50%;
        margin-right: 1.25em;
    }

    .box a {
        color: var(--white);
    }

    .h-box {
        column-count: 1;
        column-gap: 2em;
    }

    .b-footer {
        text-align: center;
        color: var(--white);
        padding-top: 50px;
    }

    .l-footer p {
        padding-right: 20%;
        color: var(--white);
    }

    @media screen and (min-width: 600px) {
        .r-footer>* {
            flex: 1;
        }

        .features {
            flex-grow: 2;
        }

        .l-footer {
            flex: 1 0px;
        }

        .r-footer {
            flex: 2 0px;
        }
    }
</style>
<footer class="footer">
    <div class="l-footer">
        <h1>
            <img src="https://i.im.ge/2022/06/12/rp0Fop.png" alt="" width="50%">
        </h1>
        <hr width="70%">

        <p>
            TEDx is a program of local, self-organized events that bring people together to share a TED-like experience. At a TEDx event, TEDTalks video and live speakers combine to spark deep discussion and connection in a small group. These local, self-organized
            events are branded TEDx, where x = independently organized TED event. The TED Conference provides general guidance for the TEDx program, but individual TEDx events are self-organized (subject to certain rules and regulations).
        </p>
    </div>
    <ul class="r-footer">
        <li>
            <h2>
                Social</h2>
            <ul class="box">
                <li><a href="https://www.facebook.com/TEDxHelwanUniversity">Facebook</a></li>
                <li><a href="https://www.instagram.com/tedxhelwanuniversity/">Instagram</a></li>
                <li><a href="#">Youtube</a></li>
            </ul>
        </li>
        <li class="features">
            <h2>Events</h2>
            <ul class="box h-box">
                <?php $selectEvent = mysqli_query($conn, "SELECT *FROM`events`");
                foreach ($selectEvent as $event) {
                ?>
                    <li><a href="#"><?php $eventYear = explode("-", $event['event_date']);
                                    echo $event['event_name'] . " " . "($eventYear[0])";  ?></a></li>
                <?php  } ?>


            </ul>
        </li>

        <li>
            <h2>
                FOLLOW TED</h2>
            <ul class="box">
                <li><a href="https://www.facebook.com/TED">Facebook</a></li>
                <li><a href="https://twitter.com/tedtalks">Twitter</a></li>
                <li><a href="https://instagram.com/ted">Instagram</a></li>
                <li><a href="https://www.youtube.com/ted">Youtube</a></li>
            </ul>
        </li>
    </ul>
    <div class="b-footer">
        <p>
            All rights reserved by ©TEDx Helwan University 2022 <br>created by IT team'22 </p>
    </div>
</footer>