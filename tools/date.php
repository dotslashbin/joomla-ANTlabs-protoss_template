<?php defined('_JEXEC') or die; ?>

	<!-- //start date -->
	<div class="today clearfix">
	  <?php //echo JText::_("TODAY_IS"). ': ';
		echo "<p class=\"typo-icon icon-calendar\">";
		echo "<span class=\"icon\">&nbsp;</span>";
		echo "<span class=\"day\">".JText::_(date ('l')).", </span>";
		echo "<span class=\"date\">".JText::_(date ('d'))." </span>";
		echo "<span class=\"month\">".JText::_(date ('F')).", </span>";
		echo "<span class=\"year\">".JText::_(date ('Y'))."</span>";
		echo "</p>";
	  ?>
	</div>
	<!-- //end date -->	