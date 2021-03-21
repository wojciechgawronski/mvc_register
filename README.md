# mvc_register
Szkielet aplikacji w architektórze MVC w czystym PHP służącej do logowania i rejestracji, na podstawie kilku tutoriali i własnych doświadczeń.
<br><br>

Link: https://gawronsky.com.pl/mvc_register
<br><br>

Zachęcam do logowania i rejestracji.
<br><br>

W Aplikacji ze względu na katalogi i funkcje można wyróżnic obszary:

<ul type='square'>
<li><b>public</b> - jedyny dostępny publicznie katalog, front controller, javascript i CSS</li>
<li><b>app</b> - serce aplikacji, główne klasy i konfiguracja</li>
<li><b>app/core/interfaces</b> - interfejsy, z których korzystają głóne modele aplikacji</li>
  <li><ol><b>MVC:</b>
<li><b>app/models</b> - modele, które będą odpowiadać widokom i kontrolerom</li>
<li><b>app/views</b> - widoki, które będą odpowiadać modelom i kontrolerom </li>
<li><b>app/controllers</b> - kontrolery, które będą odpowiadać modelom i widokom</li>
</ol></li>
<li><b>app/core/models</b> - modele, które nie pasują do helperów, ani nie mają odpowiedników w widokach i kontoloreach, np., autoryzacja</li>
 <li><b>app/helpers</b> - kalsy pomocnicze aplikacji, jak wysyłanie maili, generowanie tokenów</li>
</ul>

<br><br>
Powyższe repozytorium przedstawia jedynie zamysł.
