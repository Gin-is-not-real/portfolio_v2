<!-- CONTACT -->
<!-- <a class="ancre" id="ancre-3"></a> -->

<article id="article-contacts">
    <!-- <header class="article-header">
        <h2>CONTACTS</h2>
    </header> -->

    <div class="div-article-main" id="contacts-main-container">

        <!-- <section id="message-section">
            <header>
                <h3>Laisser un message</h3>
            </header>
        
            <div class="section-content">
                <form action="" id="form-contact">
                    <div id="contact-inputs">
                        <input type="text" placeholder="votre nom">
                        <input type="email" placeholder="votre email">
                    </div>
            
                    <div id="contact-textarea">
                        <textarea placeholder="votre message"></textarea>
                    </div>
            
                    <div>
                        <figure>
                            <img  class="icon hoverable" id="btn-send" src="<?= $img_folder_url; ?>icons/others/icon-mail-round.gif" width="64px" alt="">
                        </figure>
                         <input id="btn-send" type="submit" value="SEND"> 
                    </div>
                </form>
            </div>
        </section> -->

        <section id="message-section">
            <header>
                <h3>Laisser un message</h3>
            </header>
        
            <div class="section-content">
                <form action="" id="form-contact">
                    
                    <div id="contact-form-inputs">
                        <div id="contact-inputs">
                            <!-- <label for="inp-name">NOM</label> -->
                            <input id="inp-name" type="text" placeholder="votre nom">
                            <!-- <label for="inp-name">MAIL</label> -->
                            <input id="inp-email" type="email" placeholder="votre email">
                        </div>

                        <textarea placeholder="votre message"></textarea>
                    </div>

            

            
                    <div class="contact-input" id="contact-send">
                        <figure>
                            <img  class="icon " id="btn-send" src="<?= $img_folder_url; ?>icons/others/icon-mail-round.gif" width="64px" alt="">
                        </figure>
                        <!-- <input id="btn-send" type="submit" value="SEND"> -->
                    </div>
                </form>
            </div>
        </section>
    </div>

</section>