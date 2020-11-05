<?php

require 'includes/header.php';

?>

<!--
<form action="<?php $_SERVER['REQUEST_URI']; ?>"
method="post">

<div class="field">

    <label class="label" for="fullname_reservation">Your fullname</label>
    <div class="control has-icons-left has-icons-right">
        <input class="input" type="email" placeholder="Type your fullname" value="" id="fullname_reservation"
            name="fullname_reservation" required>
        <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
        </span>
        <span class="icon is-small is-right">
            <i class="fas fa-exclamation-triangle"></i>
        </span>
    </div>
</div>

<label class="label" for="email_reservation">Your email</label>
<div class="control has-icons-left has-icons-right">
    <input class="input" type="email" placeholder="Type your e-mail" value="" id="email_reservation"
        name="email_reservation" required>
    <span class="icon is-small is-left">
        <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
        <i class="fas fa-exclamation-triangle"></i>
    </span>
</div>
</div>


<label for="phone_reservation">Your phone number</label>
<div class="control has-icons-left has-icons-right">
    <input class="input" type="email" placeholder="Type your phone number" value="" id="phone_reservation"
        name="phone_reservation" required>
    <span class="icon is-small is-left">
        <i class="fas fa-envelope"></i>
    </span>
    <span class="icon is-small is-right">
        <i class="fas fa-exclamation-triangle"></i>
    </span>
</div>
</div>


<div class="form-group">
    <label for="fullname_reservation">Your Message </label><br>
    <textarea name="Message" id="fullname_reservation" cols="30" rows="10"></textarea>

    < <input type="text" class="form-control" id="fullname_reservation" aria-describedby="userHelp"
        name="fullname_reservation" required>

</div>

<div class="field is-grouped">
    <div class="control">
        <input type="submit" value="Submit Reservation !" name="submit_reservation" class="button is-primary">
    </div>
</div>

</form>

-->
<div class="box">
    <article class="media">
        <div class="media-left">
            <figure class="image is-64x64">
                <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <div class="content">
                <p>
                    <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                    <br>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla
                    egestas. Nullam condimentum luctus turpis.
                </p>
            </div>
            <nav class="level is-mobile">
                <div class="level-left">
                    <a class="level-item" aria-label="reply">
                        <span class="icon is-small">
                            <i class="fas fa-reply" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="retweet">
                        <span class="icon is-small">
                            <i class="fas fa-retweet" aria-hidden="true"></i>
                        </span>
                    </a>
                    <a class="level-item" aria-label="like">
                        <span class="icon is-small">
                            <i class="fas fa-heart" aria-hidden="true"></i>
                        </span>
                    </a>
                </div>
            </nav>
        </div>
    </article>
</div>


<div class="content">
    <ol type="1">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="A">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="a">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="I">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
    <ol type="i">
        <li>Coffee</li>
        <li>Tea</li>
        <li>Milk</li>
    </ol>
</div>