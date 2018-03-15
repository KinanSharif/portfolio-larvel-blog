<div class="row">
    <div class="col-sm-3 col-md-2 sidebar pull-left">
        <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
            <li>
                <form id="create_todo" method="post" action="<?= site_url('api/create_todo') ?>">
                    <input type="text" name="content" placeholder="create new todo item">
                    <input type="submit" id="create_todo" value="Create"/>
                </form>
            </li>
            <li>
                <div id="list_todo"></div>
            </li>
        </ul>


    </div>
    <div class="col-sm-9  col-md-10">
        <h1 class="page-header">Dashboard</h1>

        <h2 class="sub-header">Section title</h2>

        <form id="create_note" method="post" action="<?= site_url('api/create_note') ?>">
            <input type="text" name="title" placeholder="create new todo item">
            <textarea name="content" cols="10" rows="5"></textarea>
            <input type="submit" id="create_note" value="Create"/>
        </form>

    </div>
</div>
