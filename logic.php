<?php

//Word list from Page 1 of paulknoll.com
$word_list = Array("able",
"above",
"across",
"add",
"against",
"ago",
"almost",
"among",
"animal",
"answer",
"became",
"become",
"began",
"behind",
"being",
"better",
"black",
"best",
"body",
"book",
"boy",
"brought",
"call",
"cannot",
"car",
"certain",
"change");
$password_string = "";
$special_char = FALSE;
$add_number = FALSE;
$change_case = FALSE;

if (!empty($_POST))
{
		$num_words = count($word_list);
		$char_list = Array("#", "?", "@", "!", "%");
		$num_chars = count($char_list);
		$password_array = Array();

		$word_count = intval($_POST['word_count']);
		//echo 'Word count is '.$word_count;

		//Generate an array for the number of words we need
		for ($i = 0; $i < $word_count; $i++)
		{
			$new_word =  $word_list[rand(0, $num_words-1)];
			/*make sure the password words do not repeat */
			while (in_array($new_word, $password_array))
			{
				$new_word =  $word_list[rand(0, $num_words-1)];
			}
			$password_array[$i] = $new_word;
		}
    $change_case = (isset($_POST['change_case']) && $_POST['change_case'] == 'TRUE');
		//Concatenate the words with an '_' in between
		foreach($password_array as $key => $value)
		{
			if ($change_case == TRUE && ($key % 2 )== 1)
				$value= strtoupper($value);

			$password_string=$password_string.$value;
			if ($key != ($word_count - 1))
			{
					$password_string=$password_string.'_';
			}
			else {
				# if special char is needed concatenate that also
				if (isset($_POST['special_char']) && $_POST['special_char'] == 'TRUE')
				{
						$special_char = TRUE;
						$password_string=$password_string.$char_list[rand(0, $num_chars-1)];
				}
				else {
						$special_char = FALSE;
				}

				#if number is needed append the number at the end
				if (isset($_POST['add_number']) && $_POST['add_number'] == 'TRUE')
				{
						$add_number = TRUE;
						$password_string=$password_string.rand(100, 999);
				}
				else {
						$special_char = FALSE;
				}
			}
		}
}//if form has been posted

//$password_string = $word_list[rand(0, $num_words-1)].$char_list[rand(0, $num_chars-1)].$word_list[rand(0, $num_words-1)];

?>
