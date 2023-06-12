<?php
/*
Template Name: Обратная связь
*/
?>
<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Three
 * @since Twenty Twenty-Three 1.0
 */
// var_dump($_POST);
 if(isset($_POST)) {
    $tel = $_POST['tel'];
    $name = $_POST['first_name'];
    // var_dump($_POST["first_name"]);
    $body = "Имя: $name \n\ntel: $tel";
    $headers = 'From: '.$name.' <'."tma8085@mail.ru".'>' . "\r\n" . 'Reply-To: ' . $tel;
    // var_dump($headers);
    // var_dump($body);
    wp_mail("tma8085@mail.ru", $subject, $body, $headers);
    $emailSent = true;
    unset($_POST);
    // echo("lol");
}
get_header();
?>
    <style>
    .overlay {
        /* Скрываем подложку  */
        opacity: 0;
        visibility: hidden;

        position: fixed;
        z-index: 5;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        transition: 0.3s all;
    }
    .overlay.active {
        opacity: 1;
        visibility: visible;
        display: block;
    }

    .modal {
        position: fixed;
        z-index: 20;
        opacity: 0;
        visibility: hidden;
        display: none;
        max-width: 350px;
        height: auto;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        color: #333;
        padding: 15px;
    }

    .modal.active {
        opacity: 1;
        visibility: visible;
        display: block;
    }

    .form {
        display: flex;
        flex-direction: column;
        gap: 15px;
        position: relative;
    }

    .close {
        width: 20px;
        height: 20px;
        border: none;
        background-color: transparent;
        position: absolute;
        right: 5px;
        top: 5px;
        cursor: pointer;
    }

    .close::before,
    .close::after {
        content: "";
        background-color: #333;
        height: 2px;
        width: 100%;
        transform: rotate(45deg);
        left: 0;
        top: 50%;
        position: absolute;
    }

    .close::after {
        transform: rotate(-45deg);
    }

    .formName,
    .formPhone {
        display: flex;
        flex-direction: column;
        gap: 3px;
    }

    .formName input,
    .formPhone input {
        height: 30px;
    }

    .formAgree {
        display: flex;
        flex-direction: row;
        gap: 10px;
        align-items: center;
    }

    .formAgree input {
        width: 15px;
        height: 15px;
    }

    .submit {
        background-color: #333;
        color: #fff;
        width: 100%;
        height: 34px;
    }

    .submit:active {
        filter: invert(100%);
    }
</style>

<h1><?php wp_title(); ?></h1>
<?php the_content(); ?>
<div class="modal">
    <form class="form" action="<?php echo home_url( $_SERVER['REQUEST_URI']);?>" method="POST">
        <button class="close-modal close"></button>
        <h2>Обратный звонок</h2>
        <div class="formName"><label for="first_name">Имя</label> <input id="first_name" name="first_name"/></div>
        <div class="formPhone"><label for="phone">Телефон</label> <input id="phone" name="phone" type="tel" pattern="^[\+]7[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" required/></div>
        <div class="formAgree">
            <input name="agree" id="agree" type="checkbox" required checked/>
            <label for="agree">Согласиться на обработку персональных данных</label>
        </div>
        <button class="submit" type="submit">Отправить</button>
    </form>
</div>

<div class="overlay" id="overlay-modal"></div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        if(<?php echo $_POST["agree"]?"'on'":"'off'"?>=='on'){
            alert("Ваши данные успешно отправленны")
        }
	let isOpen = document.querySelectorAll(".isOpen");
	let overlay = document.querySelector("#overlay-modal");
	let closeButton = document.querySelector(".close-modal");
	let modalButton = document.querySelector(".open-modal");
	let modalElem = document.querySelector(".modal");

	modalButton.addEventListener("click", function (e) {
		e.preventDefault();
		modalElem.classList.add("active");
		overlay.classList.add("active");
	});

	closeButton.addEventListener("click", function (e) {
		modalElem.classList.remove("active");
		overlay.classList.remove("active");
	});

	overlay.addEventListener("click", function (e) {
		e.preventDefault();
		modalElem.classList.remove("active");
		overlay.classList.remove("active");
	});
});
</script>

<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content/content-page' );

	// If comments are open or there is at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
endwhile; // End of the loop.

get_footer();
