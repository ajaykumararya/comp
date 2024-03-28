<style>
    .right {
        float: right;
        padding-right: 10px;
    }

    #sortable1 {
        /* margin: 10px; */
        margin-bottom: 0;

    }

    .items {
        font-family: 'Source Sans Pro', sans-serif;
        list-style-type: none;
        padding: 0px;
        position: relative;
        border: 1px solid #343434;
        min-height: 400px;
        overflow-y: auto;
        overflow-x: hidden;
        /* width: 300px; */
    }

    .items li {
        margin: 20px;
        height: 40px;
        width: 92%;
        line-height: 40px;
        padding-left: 20px;
        border: 1px solid silver;
        background: #151515;
        color: white;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        cursor: move;
        -webkit-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
    }

    .items li.dragging:nth-child(n) {
        -webkit-transform: none;
        -webkit-transition: none;
        transform: none;
        transition: none;
        box-shadow: 0 0 8px black;
        background-color: #464646;
    }
</style>
<?php
// pre($this->ki_theme->findMenu('about_us'));
?>
<div class="row">
    <div class="col-md-8">
        <form action="" id="save-schema">
            <div class="{card_class}">
                <div class="card-header">
                    <h3 class="card-title">Manage Schema</h3>
                    <div class="card-toolbar">
                        {save_button}
                    </div>
                </div>
                <div class="card-body p-0 mb-0 card-image">
                    <ul id="sortable1" class="items">
                        <?php
                        // pre($this->ki_theme->schema_vars());
                        foreach($schema as $row){
                            $title = $event = $this->ki_theme->schema_vars($row['event']);
                            switch($row['event']){
                                case 'page':
                                    $page = $this->ki_theme->findMenu($row['event_id']);
                                    $title = isset($page['label']) ? $page['label'] : '<label class="badge badge-danger">'.$row['event_id'].' Page is Not Found.</label>';
                                    break;
                                case 'form':
                                    $title = $this->ki_theme->schema_vals($row['event_id']);
                                    break;
                            }
                        ?>
                        <li data-id="<?=$row['id']?>"><?=$title?> <span class="right"><?=$event?></span></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</div>