<h1 class="text-center"> Portfolio</h1>
<div class="row">
    <h2 class="text-center"> Video Game </h2>
    <?php
    foreach($query->result() as $row){
?>
        <div class="col-xs-12">
            <div class="row project">
                <div class="col-xs-2"></div>
                <div class="col-xs-8">

                    <figure class="fig-1">
                        <h3 class="text-center">
                            <?php echo $row->nom; ?>
                        </h3>
                        <img class="img-responsive img-projets" src="<?= base_url( $row->imagepath); ?>">
                    </figure>
                </div>
                <div class="col-xs-2"></div>
            </div>
        </div>
        <?php 
} ?>
</div>
<div class="row webproject">
    <h2 class="text-center"> Website </h2>
    <?php 
    foreach($querySite->result() as $row){
?>
    <div class="project ">
        <div>
            <div class="row">
                <h3 class="text-center">
                    <?php echo $row->nom; ?>
                </h3> 
                <div class="row webproject" >      
                <figure class="fig-1 figweb1">
                    <div class="col-xs-4 col-xs-push-1 web">
                        <img class="img-responsive img-projets" src="<?= base_url( $row->imagepath); ?>">
                    </div>
                    
                </figure>
                <figure class="fig-1 figweb2">
                    <div class="col-xs-4 col-xs-push-8  web">
                        <img class="img-responsive img-projets" src="<?= base_url( $row->imagepath2); ?>">
                    </div>
                </figure>
                </div>
            </div>
        </div>
    </div>
    <?php 
} ?>
</div>

