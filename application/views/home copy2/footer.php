<?php
function htmlFooter()
{
		$html=materialElement::footerContent().materialElement::closebodyElement().materialElement::closeHeaderElemet();
		return $html;	
}

echo htmlFooter();
?>