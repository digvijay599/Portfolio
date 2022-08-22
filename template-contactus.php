<?php
/**
 * Template Name: Contact Us
 *
 * @package WordPress
 * @subpackage resume
 * @since resume 1.0
 */

?>
 <?php get_header();?>
 <main id="main" class="Interior" data-barba="container" data-barba-namespace="contact">
        <section class="section Green Feature-Top" data-bg="Dark-BG">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 Text-Center Fade-In" style="opacity: 1; transform: translate(0px, 0px);">
                        <h2 class="Sub-Header Add-Flourish ">Contact</h2>
                        <h3>Get In Touch</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="section Overlap" data-bg="Light-BG">
            <div class="container">
                <div class="row">
                    <div class="Contact-Area Fade-In" style="opacity: 1; transform: translate(0px, 0px);">
                        <div class="Contact-Left">
                            <h2 class="Sub-Header">Contact Form</h2>
                            <form action="/contact-form-process.php" method="POST">
                                <div class="form-group">
                                      <label for="name">Full Name<span class="required">*</span></label>
                                      <input type="text" id="name" name="name">
                                </div>
                                <div class="form-group">
                                  <label for="email">Email<span class="required">*</span></label>
                                  <input type="text" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Comments</label>
                                    <textarea id="message" name="message"></textarea>
                                </div>
                                <button type="submit" value="Submit" class="btn btn1">Send</button>
                            </form>
                        </div>
                        <div class="Contact-Right">
                            <h2 class="Sub-Header ">Details</h2>
                            <p class="Title">Contact Information</p>
                            <ul class="icons">
                                <li>
                                    <em class="fa fa-envelope" aria-hidden="true"> <span class="screen-reader">Linked-In</span></em>
                                    <a href="mailto:jfrelich31@gmail.com">jfrelich31@gmail.com</a>
                                </li>
                                <li>
                                    <em class="fas fa-phone" aria-hidden="true"> <span class="screen-reader">Linked-In</span></em>
                                    <a href="tel:1-715-821-9075">1-715-821-9075</a>
                                </li>
                            </ul>
                            <p class="Title">Socials</p>
                            <ul class="icons">
                                <li class="linkedin">
                                    <em class="fab fab fa-linkedin-in" aria-hidden="true"></em>
                                    <a href="https://www.linkedin.com/in/jasonfrelich/" target="_blank">Linked-In</a>
                                </li>
                                <li class="facebook">
                                    <em class="fab fab fa-facebook-f" aria-hidden="true"></em>
                                    <a href="https://www.facebook.com/jfrelich/" target="_blank">Facebook</a>
                                </li>
                                <li class="instagram">
                                    <em class="fab fab fa-instagram" aria-hidden="true"></em>
                                    <a href="https://www.instagram.com/jfrelich31/" target="_blank">Instagram</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer();?>