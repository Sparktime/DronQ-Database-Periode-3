<?php

session_start();
require 'db.php';
require 'webstoreController.php';

$webstore = new webstoreController($pdo);
$rs = $webstore->getAll();

?>


<DOCTYPE html>
    <html lang="nl">


    <head>
        <meta charset="UTF-8">
        <title>List</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/main-page.css" rel="stylesheet">

    </head>
    <body id="page-top">

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <?php require 'menu.inc.php'; ?>
        <a href = "webstore.php" title="add a record" class="btn btn-success navbar-btn">Webstore</a>
    </nav>

    <!-- Images & Text -->
    <section id="info" class="showcase about-section">
        <div class="container-fluid p-0">

            <a type="button" href="http://dronq.thuis.io/database.php" class="btn">
            <div class="row no-gutters">
                <div class="col-lg-8 text-white showcase-img" style="background-image: url('img/blue-drone.jpg');"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                    <h2>DronqDroneV1Blue </h2>
                    <p class="lead mb-0">This Blue colored drone is one off the first products off Dronq Industies.</p>
                </div>
            </div>
            </a>
            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/red-drone.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>DronqDroneV1Red</h2>
                    <p class="lead mb-0">This Red colored drone is one off the first products off Dronq Industies.</p>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>DronqFridgeV1Red</h2>
                    <p class="lead mb-0">This Red colored fridge is one off the first cooling products off Dronq Industies.</p>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>DronqFridgeV1Blue</h2>
                    <p class="lead mb-0">This Blue colored fridge is one off the first cooling products off Dronq Industies.</p>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>DronqSetV1Red</h2>
                    <p class="lead mb-0">This Red colored set is a combined drone with the fridge. The set is are both off the version 1.0 of Dronq Industries</p>
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>DronqSetV1Blue</h2>
                    <p class="lead mb-0">This Blue colored set is a combined drone with the fridge. The set is are both off the version 1.0 of Dronq Industries</p>
                </div>
            </div>
        </div>
    </section>

    <!-- The Founders -->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">The founders</h2>
            <div class="row">
                <div class="col-sm">
                    <div class="testimonial-item mx-auto">
                        <img class="img-fluid rounded-circle mb-5" src="img/testimonials-1.jpg" alt="">
                        <h5>Wouter P.</h5>
                        <p class="lead mb-0">'To be part of the technology of the future is truly amazing'</p>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="testimonial-item mx-auto">
                        <img class="img-fluid rounded-circle mb-5" src="img/testimonials-2.jpg" alt="">
                        <h5>Jos de P.</h5>
                        <p class="lead mb-0">'Drones are the future and provide a lot of convenience'</p>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="testimonial-item mx-auto">
                        <img class="img-fluid rounded-circle mb-5" src="img/testimonials-4.jpg" alt="">
                        <h5>Johan P.</h5>
                        <p class="lead mb-0">'DronQ Industries wants you to have the best experience on smart living'</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item">
                            <a href="#contact" data-toggle="modal" data-target="#contact">Contact</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#agreement" data-toggle="modal" data-target="#agreement">Terms of Use</a>
                        </li>
                        <li class="list-inline-item">&sdot;</li>
                        <li class="list-inline-item">
                            <a href="#privacy" data-toggle="modal" data-target="#privacy">Privacy Policy</a>
                        </li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; DronQ Industries 2018. All Rights Reserved.</p>
                </div>


                <!--Social Logos -->
                <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item mr-3">
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="fab fa-facebook fa-3x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item mr-3">
                            <a href="https://www.twitter.com/" target="_blank">
                                <i class="fab fa-twitter-square fa-3x fa-fw"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="fab fa-instagram fa-3x fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!-- Contact form-->
    <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactmodal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactmodal">Contact Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div >
                            <div class="form-area">
                                <form role="form">
                                    <br style="clear:both">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" type="textarea" id="message" placeholder="Message" ></textarea>

                                    </div>

                                    <button type="button" id="submit" name="submit" class="btn btn-primary pull-right" data-dismiss="modal" aria-label="Close">Submit Form</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Licence Agreement -->
    <div class="modal fade" id="agreement" tabindex="-1" role="dialog" aria-labelledby="agreementmodal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agreementmodal">Terms of Use</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <h1>End-User License Agreement </h1>
                        <p>Last updated: October 02, 2018</p>
                        <p>Please read this End-User License Agreement ("Agreement") carefully before clicking the "I Agree" button, downloading or using Dronq ("Application").</p>
                        <p>By clicking the "I Agree" button, downloading or using the Application, you are agreeing to be bound by the terms and conditions of this Agreement.</p>
                        <p>This Agreement is a legal agreement between you (either an individual or a single entity) and Dronq and it governs your use of the Application made available to you by Dronq.</p>
                        <p>If you do not agree to the terms of this Agreement, do not click on the "I Agree" button and do not download or use the Application.</p>
                        <p>The Application is licensed, not sold, to you by Dronq for use strictly in accordance with the terms of this Agreement. This EULA  for Dronq is managed by <a href="https://termsfeed.com/eula/generator/">TermsFeed EULA Generator</a>.</p>
                        <h2>License</h2>
                        <p>Dronq grants you a revocable, non-exclusive, non-transferable, limited license to download, install and use the Application solely for your personal, non-commercial purposes strictly in accordance with the terms of this Agreement.</p>
                        <h2>Third-Party Services</h2>
                        <p>The Application may display, include or make available third-party content (including data, information, applications and other products services) or provide links to third-party websites or services ("Third-Party Services").</p>
                        <p>You acknowledge and agree that Dronq shall not be responsible for any Third-Party Services, including their accuracy, completeness, timeliness, validity, copyright compliance, legality, decency, quality or any other aspect thereof. Dronq does not assume and shall not have any liability or responsibility to you or any other person or entity for any Third-Party Services.</p>
                        <p>Third-Party Services and links thereto are provided solely as a convenience to you and you access and use them entirely at your own risk and subject to such third parties' terms and conditions.</p>
                        <h2>Term and Termination</h2>
                        <p>This Agreement shall remain in effect until terminated by you or Dronq.</p>
                        <p>Dronq may, in its sole discretion, at any time and for any or no reason, suspend or terminate this Agreement with or without prior notice.</p>
                        <p>This Agreement will terminate immediately, without prior notice from Dronq, in the event that you fail to comply with any provision of this Agreement. You may also terminate this Agreement by deleting the Application and all copies thereof from your mobile device or from your computer.</p>
                        <p>Upon termination of this Agreement, you shall cease all use of the Application and delete all copies of the Application from your mobile device or from your computer.</p>
                        <p>Termination of this Agreement will not limit any of Dronq's rights or remedies at law or in equity in case of breach by you (during the term of this Agreement) of any of your obligations under the present Agreement.</p>
                        <h2>Amendments to this Agreement</h2>
                        <p>Dronq reserves the right, at its sole discretion, to modify or replace this Agreement at any time. If a revision is material we will provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>
                        <p>By continuing to access or use our Application after any revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, you are no longer authorized to use the Application.</p>
                        <h2>Governing Law</h2>
                        <p>The laws of Netherlands, excluding its conflicts of law rules, shall govern this Agreement and your use of the Application. Your use of the Application may also be subject to other local, state, national, or international laws.</p>
                        <h2>Contact Information</h2>
                        <p>If you have any questions about this Agreement, please contact us.</p>
                        <h2>Entire Agreement</h2>
                        <p>The Agreement constitutes the entire agreement between you and Dronq regarding your use of the Application and supersedes all prior and contemporaneous written or oral agreements between you and Dronq.</p>
                        <p>You may be subject to additional terms and conditions that apply when you use or purchase other Dronq's services, which Dronq will provide to you at the time of such use or purchase.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Privacy Policy -->
    <div class="modal fade" id="privacy" tabindex="-1" role="dialog" aria-labelledby="privacymodal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="privacymodal">Privacy Policy</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h1>Privacy Policy</h1>


                    <p>Effective date: October 02, 2018</p>
                    <p>DronQ Industries ("us", "we", or "our") operates the dronq.com website and the DronQ mobile application (the "Service").</p>
                    <p>This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data. Our Privacy Policy  for DronQ Industries is managed through <a href="https://www.freeprivacypolicy.com/free-privacy-policy-generator.php">Free Privacy Policy</a>.</p>
                    <p>We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions.</p>

                    <h2>Information Collection And Use</h2>
                    <p>We collect several different types of information for various purposes to provide and improve our Service to you.</p>

                    <h3>Types of Data Collected</h3>

                    <h4>Personal Data</h4>
                    <p>While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). Personally identifiable information may include, but is not limited to:</p>

                    <ul>
                        <li>Email address</li><li>First name and last name</li><li>Phone number</li><li>Address, State, Province, ZIP/Postal code, City</li><li>Cookies and Usage Data</li>
                    </ul>

                    <h4>Usage Data</h4>
                    <p>We may also collect information that your browser sends whenever you visit our Service or when you access the Service by or through a mobile device ("Usage Data").</p>
                    <p>This Usage Data may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>
                    <p>When you access the Service by or through a mobile device, this Usage Data may include information such as the type of mobile device you use, your mobile device unique ID, the IP address of your mobile device, your mobile operating system, the type of mobile Internet browser you use, unique device identifiers and other diagnostic data.</p>

                    <h4>Tracking & Cookies Data</h4>
                    <p>We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.</p>
                    <p>Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.</p>
                    <p>You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
                    <p>Examples of Cookies we use:</p>
                    <ul>
                        <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>
                        <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>
                        <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>
                    </ul>

                    <h2>Use of Data</h2>
                    <p>DronQ Industries uses the collected data for various purposes:</p>
                    <ul>
                        <li>To provide and maintain the Service</li>
                        <li>To notify you about changes to our Service</li>
                        <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                        <li>To provide customer care and support</li>
                        <li>To provide analysis or valuable information so that we can improve the Service</li>
                        <li>To monitor the usage of the Service</li>
                        <li>To detect, prevent and address technical issues</li>
                    </ul>

                    <h2>Transfer Of Data</h2>
                    <p>Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>
                    <p>If you are located outside Netherlands and choose to provide information to us, please note that we transfer the data, including Personal Data, to Netherlands and process it there.</p>
                    <p>Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>
                    <p>DronQ Industries will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>

                    <h2>Disclosure Of Data</h2>
                    <h3>Legal Requirements</h3>
                    <p>DronQ Industries may disclose your Personal Data in the good faith belief that such action is necessary to:</p>
                    <ul>
                        <li>To comply with a legal obligation</li>
                        <li>To protect and defend the rights or property of DronQ Industries</li>
                        <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
                        <li>To protect the personal safety of users of the Service or the public</li>
                        <li>To protect against legal liability</li>
                    </ul>

                    <h2>Security Of Data</h2>
                    <p>The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

                    <h2>Service Providers</h2>
                    <p>We may employ third party companies and individuals to facilitate our Service ("Service Providers"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>
                    <p>These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

                    <h2>Links To Other Sites</h2>
                    <p>Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
                    <p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>

                    <h2>Children's Privacy</h2>
                    <p>Our Service does not address anyone under the age of 18 ("Children").</p>
                    <p>We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>

                    <h2>Changes To This Privacy Policy</h2>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
                    <p>We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.</p>
                    <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

                    <h2>Contact Us</h2>
                    <p>If you have any questions about this Privacy Policy, please contact us:</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="js/scroll.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.js"></script>

</body>

</html>