<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="container">


<p>
You have to extract a portion of the file name as follows: <br>
<br>
Assume it will start with date represented as long number<br>
Followed by an underscore<br>
You'll have then a filename with an extension<br>
it will always have an extra extension at the end<br>
Inputs:<br>
1231231223123131_FILE_NAME.EXTENSION.OTHEREXTENSION<br>
<br>
1_This_is_an_otherExample.mpg.OTHEREXTENSIONadasdassdassds34<br>
<br>
1231231223123131_myFile.tar.gz2<br>
Outputs<br>
FILE_NAME.EXTENSION<br>
<br>
This_is_an_otherExample.mpg<br>
<br>
myFile.tar<br>
Acceptable characters for random tests:<br>
<br>
abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-0123456789<br>
<br>
The recommended way to solve it is using RegEx and specifically groups.<br>
</p>
<?php 



function fileNameExtractor(string $dirtyFileName): string {
	
	$prefix = explode('_', $dirtyFileName);
	$dirtyFileName = str_replace($prefix[0]. '_', '', $dirtyFileName);

	$sufix = explode('.', $dirtyFileName);

	$dirtyFileName = str_replace('.' .$sufix[count($sufix) - 1], '', $dirtyFileName);

    return $dirtyFileName;
}


function fileNameExtractor_2(string $dirtyFileName): string {
	
	$dirtyFileName = preg_replace('/^([^_]+)_(.+)\.([^\.]+)$/U', '$2', $dirtyFileName);

    return $dirtyFileName;
}

__ss("FILE_NAME.EXTENSION", fileNameExtractor_2("1231231223123131_FILE_NAME.EXTENSION.OTHEREXTENSION"));
__ss("This_is_an_otherExample.mpg", fileNameExtractor_2("1_This_is_an_otherExample.mpg.OTHEREXTENSIONadasdassdassds34"));
__ss("myFile.tar", fileNameExtractor_2("1231231223123131_myFile.tar.gz2"));


function __ss($aaa, $bbb)
{
	echo '<div class="row">';
		echo '<div class="col-sm-3">';
			echo '<pre>';
			print_r($aaa);
			echo '</pre>';
		echo '</div>';
		echo '<div class="col-sm-5">';
			echo '<pre>';
			print_r($bbb);
			echo '</pre>';
		echo '</div>';
		echo "<hr>";
	echo '</div';
}


?>
</div>




