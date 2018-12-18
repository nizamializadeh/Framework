    <form id="Rating" action="<?=SITE_URL;?>/posts/rating" method="post">
    <th>
<input type="hidden" name="post_id" value="<?php
    echo  $data;?>">
        <select name="count" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
                        </th>
                        <input type="submit" value="rating  ">
</form>
