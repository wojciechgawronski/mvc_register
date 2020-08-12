<main>
      <div class="container">
            <p class="lead">
                  Kontroler przechwytuje request, decyduje czy połączyć się Modelem i renderuje Widok, z parmatreami lub bez.
            </p>
            <p class='mb-0 small'>
                  W głownym kontrolerze:
                  <ol class='small'>
                        <li>Includeowany jest plik z narzędziami</li>
                        <li>Zdefiniowana jest obsługa błędów</li>
                        <li>Zdefiniowany jest autoloader</li>
                        <li>Tworzoba jest instancja aplikacji $app = new App();</li>
                  </ol>
            </p>

            <?php
            echo "<div class='gray small'>";
            echo "Struktura aplikacji:";

            use app\helpers\FileManager;

            FileManager::wyswietlKatalog('../');
            echo "</div>";

            ?>

            <p class='small'>
                  Pliki konfiguracyjne .htaccess:
                  <ul type='square' class="small">
                        <li>
                              Przekierowują cały ruch do katalogu public - <b>index.php</b> - front kontrolera
                        </li>
                        <li>
                              Zabezpieczają przed neiautoryzowanym dostępem do katalogów w folderze public, np.: js, css.
                        </li>
                        <li>
                              Request wpada do zmiennej $url = $_GET['url'] dzięki konfiguracji .htaccess. Jest więc w supergloblnej $_GET['url'], dostęnej w kazdym miejscu aplikaji.
                        </li>
                  </ul>
            </p>

            <hr class="bg-primary">

            <ol>
                  <li><span class="b orange"> KONTROLER </span><br>
                        <br>W konstruktorze parsujemy $app URL do tablicy, na podstawie url[0] sptawdzamy czy istnieje kontroler i url[1] czy istnieje wywowylana przez nas metoda, jesli nie, odpalasi eie metoda index() z kontrolra lub kontrolera głownego <br>
                        We front kontrolerze tworzymy insancje klasy App i autmatycznie ustawiamy defaultową kofigurację aplikacji:
                        <ul type='square' class='text-info small'>
                              <li>protected $controller = home;</li>
                              <li>$method = index, </li>
                              <li>$params = [];</li>
                        </ul>
                        <p>W URL można przekazywać argumenty do metody, jes w kontrolerze odpowiedzialnym za widok zdjefiniuje sie odpowiednio paramtery, dowolną ilość</p>
                        <p>W konstruktorze parsujemy URL: pierszwy parametr to kontrolwer, drugi to metoda - sprawddzamy czu istnieje. Jesli tak, jest wykowyana, jesli nie - pzechodzi do piwrwszego parametru; następne to parametry</p>

                        Front kontlorer (public/index.php) tworzy:
                        <ul type='square' class='text-info small'>
                              <li><b class=''>instację klasy głównej aplikacji App. W konstruktorze</b></li>
                              <ol>
                                    <li>
                                          Pardsowanie URL: kontroler / metoda / paramtery
                                    </li>
                                    <li>Ustanowenie defoltowych wartości:
                                          <br>- home controler
                                          <br> -metoda indexindex
                                    </li>
                                    <li>Gdy kontroler nie został znaleziony strona renderowana jest w głónym kontrolerze 404</li>
                              </ol>
                              <li>
                                    Każdy kontroler zawiera metody before i after które można wywołac przed i po akcji
                              </li>
                        </ul>

                        <br>Konstruktor przechwytuje URL i przesyła go do kontrolera
                        <br>Domyślny kontroller to na home/index

                  </li>
                  <li class='mt-3'>
                        <span class="b orange">MODEL </span><br>
                        <br> - głowny model w katalogu Core
                        <br> - pomocnicze model jak model FileManager
                  </li>
                  <li class='mt-3'>
                        <span class="b orange">WIDOK </span><br>
                        <br>
                        <p>Główna klasa widoku zawiera dwie statyczne metody - 1) renderView, 2) renderError, które sa wywoływane przez kontroler. Sugerowane jest, aby przed większiością akcje renderowowanai widoków używać w Kontrolerze metody filtry akcji: before() i after()</p>
                        <p>Widoki to pliki php z kodem HTML i minimalną ilośćą PHP. Dane są przesyłane przez metodę render. ()</p>
                        <ul type='square' class='text-info small'>
                              <li>
                                    Wzorzec Template: widoki mogą includeować elementy stronyzkatalogu z inc, w

                              </li>
                        </ul>

                        Kontroller może skorzystać z paramtrów przesyłanych w requeście. W funkcji index() następuje glowna akcja - renderowanie treści z metody rodzica. Można także wykowywać inne akcje w innych funkcjach poprzez URL: kontroler: motoda/akcja/parametr
                  </li>
            </ol>

            <p class="gray">
                  Należy uwtowztyć plik widoku, oraz Controller //by utworzyć Widok należy: utworzyć kontroller, z zaimplementowaną metodą index()
            </p>
      </div>
</main>