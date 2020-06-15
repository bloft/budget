<fieldset><legend>Info</legend>
<form class="form-horizontal"  action="index.php" method="post">
<table class="table table-condensed table-hover">
	<thead>
		<tr>
			<th>Name</th>
			<th>Betalings månede</th>
			<th>Betalinger pr. År</th>
			<th>Beløb</th>
		</tr>
	</thead>
{foreach from=$data key=id item=info}
	<tr>
		<td>
			<input name="{$id}_name" type="text" class="form-control" placeholder="Name" value="{$info[0]}">
		</td>
		<td>
			<select name="{$id}_month" class="form-control">
				{foreach $months as $index=>$month}
					{if $index eq {$info[1]}}
						<option value="{$index}" selected>{$month}</option>
					{else}
						<option value="{$index}">{$month}</option>
					{/if}
				{/foreach}
			</select>
		</td>
		<td>
			<select name="{$id}_interval" class="form-control">
				{foreach from=$aYear item=i}
					{if $i eq {$info[2]}}
						<option selected>{$i}</option>
					{else}
						<option>{$i}</option>
					{/if}
				{/foreach}
			</select>
		</td>
		<td>
			<input name="{$id}_amount" type="text" class="form-control" placeholder="Amount" value="{$info[3]}">
		</td>
	</tr>
{/foreach}
</table>
<input type="hidden" name="method" value="save" />
<button type="submit" class="btn">Save</button>
</form>
</fieldset>
