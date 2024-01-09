<style>
    .collapsible 
    {
        background-color: #502701BF;
        color: #222226;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
    }

    .active, .collapsible:hover 
    {
        background-color: #502701AD;
    }

    .content 
    {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        background-color: #f1f1f1;
    }

    .faq
    {
        padding-bottom: 15px;
    }
</style>

<section style="padding: none;" class="products-section wow fadeInUp">
    <div class="container">
        <h1 class="page_heading mdi md-local-offer">FAQs:</h1>
    </div>
    <div class="container">
        <?php
            if ($f_count != 0)
            {
                foreach($faqs as $val)
                {
        ?>
                    <div class="faq">
                        <button type="button" class="collapsible"><?= $val['title']?></button>
                        <!-- <h4></h4> -->
                        <div class="content">
                            <p><?= $val['detail']?></p>
                        </div>
                    </div>
        <?php
                }
            }
            else
            {
        ?>
                <h2 style="text-align: center;">No FAQs yet.</h2>
        <?php
            }
        ?>
    </div>
</section>

<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) 
    {
        coll[i].addEventListener("click", function()
        {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block")
            {
                content.style.display = "none";
            }
            else
            {
                content.style.display = "block";
            }
        });
    }
</script>