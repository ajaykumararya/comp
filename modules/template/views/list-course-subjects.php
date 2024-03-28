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
    }

    .items::after {
        content: "";
        /* Create a pseudo-element */
        display: table;
        /* Ensure pseudo-element affects layout */
        clear: both;
        /* Clear floats */
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
<div class="card border border-primary p-0 mb-0 card-image">

    <div class="card-header">
        <h3 class="card-title"></h3>
        <div class="card-toolbar">
            {save_button}</div>
    </div>
    <div class="card-body pt-1" style="min-height:400px">
        <ul id="sortable1" class="items p-0">
            {subjects}
            <li data-id="{id}">
                {subject_name} <span class="right">{subject_code}</span>
            </li>
            {/subjects}
        </ul>
    </div>
</div>