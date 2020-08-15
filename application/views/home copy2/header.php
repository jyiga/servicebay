<?php

function htmlheader()
{
	$html=materialelement::headerElemet().materialelement::bodyElement();
	$html.=materialelement::navigationPanel();
	$html.=materialelement::navBar();
	$html.=materialelement::banner();
	$html.=materialelement::xter();
	return $html;
}

echo htmlheader();



?>