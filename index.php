<?php
require "data.php";

/* Функция возвращает основные характеристики команды: среднее количество забитых и пропущенных голов, вероятность победы, 
 * поражения и ничьи, а также относительная сила команды, которая является суммой отношения забитых голов к пропущенным
 * и выигранных матчей к проигранным */

function getTeamSettings($team){
	require "data.php";
	
	$GoalScoredProb = round($data[$team]["goals"]["scored"] / $data[$team]["games"],2); //Среднее количество забитых голов
	$GoalSkipedProb = round($data[$team]["goals"]["skiped"] / $data[$team]["games"],2); //Среднее количество пропущенных голов
	$WinProb =  round($data[$team]["win"]/$data[$team]["games"]*100,2); //Вероятьность победить
	$DrawProb =  round($data[$team]["draw"]/$data[$team]["games"]*100,2); //Вероятность сыграть вничью
	$DefeatProb =  round($data[$team]["defeat"]/$data[$team]["games"]*100,2); //Вероятность проиграть
	$Strength = round($GoalScoredProb/$GoalSkipedProb + $WinProb/$DefeatProb,2); //Относительная сила команды
	return array("Strength" => $Strength, "GoalScore" => $GoalScoredProb, "GoalSkiped" => $GoalSkipedProb, "WinProb" => $WinProb, "DrawProb" => $DrawProb, "DefeatProb" => $DefeatProb);
}


/* Функция добавляет значения в массив 
 * $array - массив, в который нужно добавить значение
 * $value - значение, которое нужно добавить
 * $count - сколько раз добавить значение в массив*/
function pushArray($array, $value, $count){
	for  ($i = 1; $i <= $count; $i++){
		array_push($array, $value);
	}
	return $array;
}


/* Функция забитых голов
 * $score - максимальное количество голов, которое может забить команда в данном матче
 */
function score($score){
	/* Исходя из формулы, сборная Бразилии может забить Болгарии 14 голов, потому, чтобы было более или менее 
	 *похоже на правду, ограничиваем все девятью голами. 
	 */
	if ($score > 9){
		$score = 9;
	}
	$arrayScore = array();

	if ($score == 0){
		for ($i = 0; $i <= 1; $i++){
			switch ($i){
				/*Если из расчетов формулы команда может забить 0 голов, то делаем вероятность того, что один гол все-таки 
				 * залетит равным 20%.
				*/
				case 0: $amount = 4;break;
				case 1: $amount = 1;break;
			}
			//Формируем исходный массив с возможными голами	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
		// Возвращаем случайный элемент массива.
		return $arrayScore[array_rand($arrayScore, 1)];
	}
	elseif ($score == 1){
		for ($i = 0; $i <= 1; $i++){
			switch ($i){
				/* Если максимальное количество голов, которые может забить команда равно 1, то с равной долей вероятности 
				 * они могут забить 1 гол, а могут не забить вовсе.
				 */
				case 0: $amount = 1;break;
				case 1: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}		
	elseif ($score == 2){
		for ($i = 0; $i <= 2; $i++){
			switch ($i){
				/* Если команда может забить максимум 2 гола, то с вероятностью в 25% она голов не забьет или забьет 2 гола
				 * или с вероятностью 50% забьет один гол. И так далее для всех вариантов голов от 3 до 9.
				 */
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	elseif ($score == 3){
		for ($i = 0; $i <= 3; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 2;break;
				case 3: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	elseif ($score == 4){
		for ($i = 0; $i <= 4; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 3;break;
				case 3: $amount = 2;break;
				case 4: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	elseif ($score == 5){
		for ($i = 0; $i <= 5; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 3;break;
				case 3: $amount = 3;break;
				case 4: $amount = 2;break;
				case 5: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	elseif ($score == 6){
		for ($i = 0; $i <= 6; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 3;break;
				case 3: $amount = 4;break;
				case 4: $amount = 3;break;
				case 5: $amount = 2;break;
				case 6: $amount = 1;break;
			}
			
			$arrayScore = pushArray($arrayScore, $i, $amount); 
		}
		
		return $arrayScore[array_rand($arrayScore, 1)];
	}
	elseif ($score == 7){
		for ($i = 0; $i <= 7; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 3;break;
				case 3: $amount = 4;break;
				case 4: $amount = 4;break;
				case 5: $amount = 3;break;
				case 6: $amount = 2;break;
				case 7: $amount = 1;break;
			}
				
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	elseif ($score == 8){
		for ($i = 0; $i <= 8; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 3;break;
				case 3: $amount = 4;break;
				case 4: $amount = 5;break;
				case 5: $amount = 4;break;
				case 6: $amount = 3;break;
				case 7: $amount = 2;break;
				case 8: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	elseif ($score == 9){
		for ($i = 0; $i <= 9; $i++){
			switch ($i){
				case 0: $amount = 1;break;
				case 1: $amount = 2;break;
				case 2: $amount = 3;break;
				case 3: $amount = 4;break;
				case 4: $amount = 5;break;
				case 5: $amount = 5;break;
				case 6: $amount = 4;break;
				case 7: $amount = 3;break;
				case 8: $amount = 2;break;
				case 9: $amount = 1;break;
			}
	
			$arrayScore = pushArray($arrayScore, $i, $amount);
		}
	
		return $arrayScore[array_rand($arrayScore, 1)];
	}	
	
}

function match($team1, $team2){
	
	require "data.php";
	

	// Получаем характеристики команд
	$Team1 = getTeamSettings($team1);
	$Team2 = getTeamSettings($team2);

	

		/*Если одна команда сильнее другой более чем на одну единицу, то получаем коэффициент забитого гола, равного 
		 * Сила одной команды минус Сила другой команды (по модулю) деленная на 10. Это значение вычитаем из единицы,
		 * чтобы у команды с меньшим различием в Силе, коэффициент был относительно небольшой
		 * Если разница между силой команд равне или меньше единицы (по модулю), то коэффициент не учитывается.
		 */
		if(abs($Team1["Strength"] - $Team2["Strength"]) > 1){
			$q = (1 - abs($Team1["Strength"] - $Team2["Strength"])/10);
		}
		else{
			$q = 1;
		}
		
		//Проверяем, если первая команда сильнее второй
			if ($Team1["Strength"] > $Team2["Strength"]){
				/* Получаем количество забитых голов командами по формуле: Сила первой команды прибавить Силу второй 
				 * команды деленной на коэффициент, и все это умножить на силу команды и разделить на три 
				 * (3 - это средняя сила команд)
				 * У второй команды коэффициент равен единице, а потому он не участвует в расчете. 
				 */
				 $CanScore = score(ceil(($Team1["GoalScore"] + $Team1["GoalScore"] / $q) * $Team1["Strength"] / 3));
				 $CanScore2 = score(ceil(($Team2["GoalScore"] + $Team2["GoalScore"] * 1) * $Team2["Strength"] / 3));
			}
			else{
				 $CanScore = score(ceil(($Team1["GoalScore"] + $Team1["GoalScore"] * 1) * $Team1["Strength"] / 3));
				 $CanScore2 = score(ceil(($Team2["GoalScore"] + $Team2["GoalScore"] / $q) * $Team2["Strength"] / 3));
				}
			//возвращаем счет.
			return array($CanScore, $CanScore2);
}
	
	



?>