
<div class="row">
    <div class="col-sm-1 col-sm-offset-10">
        <form class="form-horizontal">
            <div class="form-group"> 
                <select class="form-control" id="sort" name="sort">
                    <option value="" disabled selected>Sort By:</option>
                    <option value="<?=urlencode('s.name ASC')?>">A-Z</option>
                    <option value="<?=urlencode('s.name DESC')?>">Z-A</option>
                    <option value="<?=urlencode('s.price ASC')?>">Price low - high</option>
                    <option value="<?=urlencode('s.price DESC')?>">Price high - low</option>
                </select>
            </div>
            <input type="hidden" name="action" value="<?=$action?>">
            <button type="submit" class="btn btn-xs btn-success">Sort</button>
        </form>
    </div>
</div>