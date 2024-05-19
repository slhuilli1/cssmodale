 <?php
	defined('_JEXEC') or die('Access deny');
	
	class plgContentcssmodale extends JPlugin 
	{
		function onContentPrepare($content, $article, $params, $limit){	
			
			
			$re = '/{cssmodale\s*"(.*)"\s*"(.*)"\s*(.*)"}/m';
			preg_match_all($re, $article->text, $matches, PREG_SET_ORDER, 0);
			$i=0;
			foreach ($matches as $unFenetre)
			{
				//Extraction du titre du bouton : 
				$re = '/{cssmodale\ss*?"(.*)"/mU';
				preg_match_all($re, $unFenetre[0], $matches, PREG_SET_ORDER, 0);
				
				
				$chaine = '<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modale'.$i.'" >'.$matches[0][1].'</button></p>
							<div id="Modale'.$i.'" class="modal fade" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 id="exampleModalLabel" class="modal-title">'.$matches[0][1].'</h5>
										</div>
										<div class="modal-body">
											Contenu au format HTML  
										</div>
										<div class="modal-footer">
											<button class="btn btn-secondary" type="button" data-dismiss="modal">Fermer</button>
										</div>
									</div>
								</div>
							</div>';
				$article->text = str_replace($unFenetre[0],$chaine,$article->text 	);
				$i++;
			}

		}	
	}
?>
