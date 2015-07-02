	</div>

	<footer class="footer">
		<p><a href="mailto:charles@hespandjones.co.uk" class="email"><img src="/media/images/email-us.png" alt="email us" /></a></p>
		<p>Telephone: <span class="lg">01904 470256</span></p>
		<p class="copyright">&copy; <?=site_title?> <?php echo date("Y"); ?> &nbsp;<br/>
			&nbsp; Website by <a href="http://www.bowhouse.co.uk">www.bowhouse.co.uk</a></p>
	</footer>

</div> <!-- /container -->

<?=fn::get_footer()?>

<?php foreach(fn('page.scripts') as $__inc): ?>
<script src="<?=$__inc?>"></script>
<?php endforeach; ?>

</body>
</html>
