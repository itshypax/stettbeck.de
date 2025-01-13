<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OVo-SB &rsaquo; Hansestadt Stettbeck</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../assets/css/style.min.css" />
    <link rel="stylesheet" href="../../assets/fonts/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../../assets/fonts/ptsans/css/all.min.css" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/assets/bootstrap-5.3/css/bootstrap.min.css">
    <script src="/assets/bootstrap-5.3/js/bootstrap.min.js"></script>
    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/favicon.ico" />
    <!-- Metas -->
    <meta name="theme-color" content="#de2b14" />
    <meta property="og:site_name" content="NordNetzwerk" />
    <meta property="og:url" content="https://stettbeck.de/recht/gesetze/OVo-SB" />
    <meta property="og:title" content="OVo-SB - Rechtsportal der Hansestadt Stettbeck" />
    <meta property="og:image" content="https://stettbeck.de/assets/img/STETTBECK_1.png" />
    <meta property="og:description" content="Das amtliche Rechtsportal der Hansestadt Stettbeck." />
    <?php $activePage = "recht"; ?>
</head>

<body data-page-type="lawsite" style="overflow-x: hidden">
    <!-- NAV BEGIN -->
    <?php
    $pageTitle = "Rechtsportal";
    $pageSubTitle = "Freie Hansestadt Stettbeck";
    include "../../assets/php/topnav-recht.php"; ?>
    <!-- NAV END -->
    <hr class="my-5 text-light mobile-hide" />
    <!-- CONTENT BEGIN -->

    <div class="container-full position-relative">

        <div class="row">

            <div class="col-2 position-relative mobile-hide" id="law-sidenav">
                <div class="p-1 scrollable-container">
                    <a class="law-sidelink" href="#g-title" onclick="setActiveLink(this)">
                        <div class="p-2">Stadtverordnung zur Aufrechterhaltung der Ordnung an öffentlichen Plätzen (Allgemeine Ordnungsverordnung - OVo-SB) vom 07. Januar 2023</div>
                    </a>

                    <hr class="mx-2">

                    <?php

                    $current_file = basename($_SERVER['PHP_SELF']);

                    if (strpos($current_file, '.php') == false) {
                        // The current file does not have a .php extension
                        $current_file = $current_file . '.php';
                    }

                    $html = file_get_contents($current_file);

                    // Load the HTML content into a DOMDocument object
                    $dom = new DOMDocument;
                    $dom->loadHTML($html);

                    // Get all the h6 elements
                    $h6s = $dom->getElementsByTagName('h6');

                    // Output the h6 elements
                    foreach ($h6s as $h6) {
                        $id = $h6->getAttribute('id');
                        $content = $h6->nodeValue;
                        echo "<a class='law-sidelink' href='#s-$id' onclick='setActiveLink(this)'>";
                        echo "<div class='p-2' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='$content'>$content</div>";
                        echo "</a>";
                    }
                    ?>
                </div>
                <div class="resizer" style="position: absolute; top: 0; right: -5px; width: 15px; height: 100%; cursor: ew-resize;">
                    <i class="fa-solid fa-xs fa-bars"></i>
                </div>
            </div>
            <!-- ### -->
            <!-- HEADER - ERLASSER / GRUNDDATEN -->
            <!-- ### -->
            <div class="col ms-3 me-5" id="law-content">
                <div class="container-full py-3 rounded-3" id="ea">
                    <div class="container-full border-top p-3 align-items-center">
                        <div class="single-view-navigation" style="display:none">
                            <button class="single-view-button prev-button"><i class="fa-solid fa-chevrons-left"></i></button>
                            <h2 class="single-view-title"></h2>
                            <button class="single-view-button next-button"><i class="fa-solid fa-chevrons-right"></i></button>
                        </div>
                    </div>
                    <div class="container-full mb-3 position-relative p-3 border-top border-bottom">
                        <div class="row">
                            <div class="col">
                                <div class="row mb-1">
                                    <div class="col">Amtliche Abkürzung:</div>
                                    <div class="col-8 fw-bold">OVo-SB</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">In der Fassung vom:</div>
                                    <div class="col-8 fw-bold">07.01.2023</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">Gültig ab:</div>
                                    <div class="col-8 fw-bold">07.01.2023</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">Gültig bis:</div>
                                    <div class="col-8 fw-bold">Unbestimmt / Widerruf</div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col">Dokumententyp:</div>
                                    <div class="col-8 fw-bold">Verordnung</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row mb-1">
                                    <div class="col">Quelle:</div>
                                    <div class="col-8"><img src="../../assets/img/STETTBECK_RUND.png" height="40" width="auto" alt="Rundwappen Stettbeck" title="Freie Hansestadt Stettbeck"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-full mb-3" id="view-select">
                        <div class="row text-center">
                            <div class="col-1 px-2 py-3 border-bottom">
                                <button class="btn-invis" id="switch-single">
                                    Einzelansicht
                                </button>
                            </div>
                            <div class="col-2 px-2 py-3 view-active border-bottom">
                                <button class="btn-invis" id="switch-full">
                                    Aktuelle Gesamtausgabe
                                </button>
                            </div>
                            <div class="col border-bottom"></div>
                        </div>
                    </div>
                    <!-- ### -->
                    <!-- TITEL -->
                    <!-- ### -->
                    <div class="container-full">
                        <div class="container-full">
                            <h5 class="text-center fw-bold mb-4" id="g-title">Stadtverordnung zur Aufrechterhaltung der Ordnung an öffentlichen Plätzen<br />(Allgemeine Ordnungsverordnung - OVo-SB)<br />Vom 07. Januar 2023</h5>
                            <div id="last-changed">
                                <p><em>Gesamtausgabe in der unbefristeten Gültigkeit vom 07.01.2023</em></p>
                                <p><span class="fw-bold text-decoration-underline" style="margin-right:25px">Stand:</span> letzte Berücksichtigte Änderung: § 6 hinzugefügt (06. Juli 2023)</p>
                            </div>
                            <!-- ### -->
                            <!-- INHALTSVEZEICHNIS -->
                            <!-- ### -->
                            <div id="inhaltsverzeichnis">
                                <div class="my-5"></div>
                                <p class="fw-bold">Nichtamtliches Inhaltsverzeichnis</p>
                                <table class="table table-striped table-borderless" style="border-spacing: 5px; border-collapse:unset" id="law-contentlist">
                                    <thead>
                                        <th scope="col" style="padding:5px">Titel</th>
                                        <th scope="col" style="padding:5px">Gültig ab</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $current_file = basename($_SERVER['PHP_SELF']);

                                        if (strpos($current_file, '.php') == false) {
                                            // The current file does not have a .php extension
                                            $current_file = $current_file . '.php';
                                        }

                                        $html = file_get_contents($current_file);

                                        // Load the HTML content into a DOMDocument object
                                        $dom = new DOMDocument;
                                        $dom->loadHTML($html);

                                        // Get all the h6 elements
                                        $h6s = $dom->getElementsByTagName('h6');

                                        // Output the h6 elements
                                        foreach ($h6s as $h6) {
                                            $id = $h6->getAttribute('id');
                                            $content = $h6->nodeValue;
                                            $dateAdded = $h6->getAttribute('data-added-date');
                                            echo "<tr>";
                                            echo "<td style='padding:5px'><a href='#$id'>$content</a></td>";
                                            echo "<td style='padding:5px'><a href='#$id' data-bs-toggle='tooltip' data-bs-placement='bottom' data-bs-title='$content'>$dateAdded</a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- ### -->
                            <!-- INHALT -->
                            <!-- ### -->
                            <div id="s-p-1">
                                <h6 class="text-center fw-bold  my-4" id="p-1" data-added-date="07.01.2023">§ 1<span style="display:none"> - </span><br />Begriffsdefinition</h6>
                                <p class="text-justify">(1) Als öffentlicher Platz wird im Sinne dieser Verordnung jedweder Platz von öffentlichem Interesse oder entsprechend einer besonderen Sicherheitsfunktion definiert. Darunter fallen vor allem, aber nicht nur:</p>
                                <dl>
                                    <dt style="float: left; min-width: 1em">1.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">Dienststellen der Landespolizei,</p>
                                    </dd>
                                    <dt style="float: left; min-width: 1em">2.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">Gebäude der Landesregierung, Kommunalverwaltung oder im Zusammenhang mit dem Rathaus der Hansestadt Stettbeck,</p>
                                    </dd>
                                    <dt style="float: left; min-width: 1em">3.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">Gebäude öffentlicher Institutionen, staatlicher oder staatlich geförderter Unternehmen oder Organisationen,</p>
                                    </dd>
                                    <dt style="float: left; min-width: 1em">4.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">Krankenhäuser, Rettungswachen und Feuerwachen,</p>
                                    </dd>
                                    <dt style="float: left; min-width: 1em">5.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">der Stadtpark.</p>
                                    </dd>
                                </dl>
                                <p class="text-justify">(2) Umliegende, der zu den Gebäuden nach Absatz 1 gehörenden, Gelände gelten ebenfalls als öffentliche Plätze.</p>
                            </div>
                            <div id="s-p-2">
                                <h6 class="text-center fw-bold  my-4" id="p-2" data-added-date="07.01.2023">§ 2<span style="display:none"> - </span><br />Besondere Verbote</h6>
                                <p class="text-justify">(1) Personen mit amtlich ausgestellten Waffenbesitzkarten, kleinen Waffenscheinen, großen Waffenscheinen oder Jagdscheinen ist es zusätzlich zu den geltenden Regelungen des <a href="https://dejure.org/gesetze/WaffG" target="_blank" class="law-link">§ 42 Waffengesetz (WaffG)</a> verboten, an öffentlichen Plätzen, im Sinne dieser Verordnung, Waffen offen zu führen oder zu tragen.</p>
                                <p class="text-justify">(2) Zusätzlich findet <a href="https://dejure.org/gesetze/VersG/17a.html" class="law-link" target="_blank">§ 17a Versammlungsgesetz (VersG)</a> an öffentlichen Plätzen, im Sinne dieser Verordnung, Anwendung.</p>
                            </div>
                            <div id="s-p-3">
                                <h6 class="text-center fw-bold  my-4" id="p-3" data-added-date="07.01.2023">§ 3<span style="display:none"> - </span><br />Geltungsbeginn; Geltungsdauer</h6>
                                <p class="text-justify">(1) Diese Verordnung kommt sofort zur Geltung.</p>
                                <p class="text-justify">(2) Diese Verordnung gilt unbefristet und bedarf offizieller Widerrufung.</p>
                            </div>
                            <div id="s-p-4">
                                <h6 class="text-center fw-bold  my-4" id="p-4" data-added-date="07.01.2023">§ 4<span style="display:none"> - </span><br />Ahndung</h6>
                                <p class="text-justify">Geahndet wird ein Verstoß gegen § 2 Absatz 1 entsprechend <a href="https://dejure.org/gesetze/WaffG/52.html" class="law-link" target="_blank">§ 52 Absatz 3 Nummer 9 Waffengesetz</a>.</p>
                            </div>
                            <div id="s-p-5">
                                <h6 class="text-center fw-bold my-4" id="p-5" data-added-date="05.03.2023">§ 5<span style="display:none"> - </span><br />Ausnahmeregelungen</h6>
                                <p class="text-justify">(1) Folgende Personengruppen, Institutionen und Unternehmen sind von der Vorschrift entsprechend Paragraf 2 und Paragraf 4 nicht betroffen:</p>
                                <dl>
                                    <dt style="float: left; min-width: 1em">1.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">Polizeivollzugsbeamte (auch im Vorbereitungsdienst),</p>
                                    </dd>
                                    <dt style="float: left; min-width: 1em">2.</dt>
                                    <dd style="margin-left: 2.5em; margin-bottom: 3ex">
                                        <p class="text-justify">Mitarbeiter von staatlich anerkannten Sicherheitsfirmen mit einem gültigen großen Waffenschein und zugehöriger Waffenbesitzkarte.</p>
                                    </dd>
                                </dl>
                                <p class="text-justify">(2) Firmen nach Absatz 1 Nummer 2 sind nur von dieser Vorschrift ausgenommen insofern diese bei der zuständigen Behörde ein Sicherheitskonzept, welches eindeutig eine solche Ausnahmeregelung begründet, eingereicht hat und dieses genehmigt wurde.</p>
                                <p class="text-justify">(3) Als zuständige Behörde ist die Kommunalverwaltung der Freien Hansestadt Stettbeck in Zusammenarbeit mit der Landespolizeidirektion Stettbeck berufen.</p>
                            </div>
                            <div id="s-p-6">
                                <h6 class="text-center fw-bold my-4" id="p-6" data-added-date="06.07.2023">§ 6<span style="display:none"> - </span><br />Erweiterte Maßnahmen durch Polizeibehörden</h6>
                                <p class="text-justify">Am Stadtpark (§ 1 Abs. 1 Nr. 5) sind Polizeibehörden zu anlassunabhängigen Kontrollen und Durchsuchungen zur Feststellung der Einhaltung dieser Verordnung befugt.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT END -->
    <hr class="my-5 text-light" />
    <!-- FOOTER BEGIN -->
    <?php include "../../assets/php/footerbot-recht.php"; ?>
    <!-- FOOTER END -->

    <!-- Back to top button -->
    <button type="button" class="btn btn-sh-stt-2 shadow btn-floating btn-lg" id="btn-back-to-top">
        <i class="fa-light fa-arrow-up"></i>
    </button>
    <script src="../../backtotop.js"></script>
    <!-- Status for Sidenav -->
    <script>
        function setActiveLink(link) {
            var links = document.getElementsByClassName('law-sidelink');
            for (var i = 0; i < links.length; i++) {
                links[i].classList.remove('active');
            }
            link.classList.add('active');
            var sectionId = link.getAttribute('href').substring(1);
            if (location.hash.includes('single-view')) {
                navigateToSection(sectionId);
                event.preventDefault();
            }
        }
    </script>
    <!-- Resizable Sidenav -->
    <script>
        const resizer = document.querySelector('#law-sidenav .resizer');
        const resizableCol = document.querySelector('#law-sidenav');

        resizer.addEventListener('mousedown', initResize, false);

        let startX, startWidth;

        function initResize(e) {
            startX = e.clientX;
            startWidth = parseInt(document.defaultView.getComputedStyle(resizableCol).width, 10);
            document.addEventListener('mousemove', doResize, false);
            document.addEventListener('mouseup', stopResize, false);
            document.body.style.setProperty('--selection-bg', 'transparent');
            document.body.style.setProperty('--selection-color', '#000');
        }

        function doResize(e) {
            resizableCol.style.width = (startWidth + e.clientX - startX) + 'px';
        }

        function stopResize(e) {
            document.removeEventListener('mousemove', doResize, false);
            document.removeEventListener('mouseup', stopResize, false);
            document.body.style.setProperty('--selection-bg', 'var(--oxford-blue)');
            document.body.style.setProperty('--selection-color', 'var(--white)');
            const selection = window.getSelection();
            if (!selection.isCollapsed) {
                selection.removeAllRanges();
            }
        }
    </script>
    <!-- Enable Tooltips -->
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <!-- Einzel-/Komplettansicht -->
    <script>
        // Get all the section IDs
        var sectionIds = [];
        var sections = document.getElementsByTagName('div');
        for (var i = 0; i < sections.length; i++) {
            if (sections[i].id.startsWith('s-p-')) {
                sectionIds.push(sections[i].id);
            }
        }

        // Declare currentSectionIndex variable
        var currentSectionIndex = 0;

        // Add event listener to the single-view button
        document.getElementById('switch-single').addEventListener('click', function() {
            // Add the view-active class to the parent div of the button
            this.parentNode.classList.add('view-active');

            // Remove the view-active class from the full-view button's parent div
            document.getElementById('switch-full').parentNode.classList.remove('view-active');

            // Hide the table of contents and last-changed divs
            document.getElementById('inhaltsverzeichnis').style.display = 'none';
            document.getElementById('last-changed').style.display = 'none';

            // Hide all sections except the first one
            for (var i = 1; i < sectionIds.length; i++) {
                document.getElementById(sectionIds[i]).style.display = 'none';
            }

            // Show the first section and update the title
            var currentSection = document.getElementById(sectionIds[currentSectionIndex]);
            currentSection.style.display = 'block';
            document.querySelector('.single-view-title').textContent = currentSection.querySelector('h6').textContent;

            // Add event listeners to the navigation buttons
            document.querySelector('.prev-button').addEventListener('click', function() {
                if (currentSectionIndex > 0) {
                    currentSectionIndex--;
                    var currentSection = document.getElementById(sectionIds[currentSectionIndex]);
                    navigateToSection(currentSection.id);
                }
                // Update the hash fragment
                location.hash = 'single-view:' + sectionIds[currentSectionIndex];
            });

            document.querySelector('.next-button').addEventListener('click', function() {
                if (currentSectionIndex < sectionIds.length - 1) {
                    currentSectionIndex++;
                    var currentSection = document.getElementById(sectionIds[currentSectionIndex]);
                    navigateToSection(currentSection.id);
                }
                // Update the hash fragment
                location.hash = 'single-view:' + sectionIds[currentSectionIndex];
            });



            // Show the navigation buttons
            document.querySelector('.single-view-navigation').style.display = 'flex';

            // Update the hash fragment
            location.hash = 'single-view:' + sectionIds[currentSectionIndex];
        });

        // Add event listener to the full-view button
        document.getElementById('switch-full').addEventListener('click', function() {
            // Add the view-active class to the parent div of the button
            this.parentNode.classList.add('view-active');

            // Remove the view-active class from the single-view button's parent div
            document.getElementById('switch-single').parentNode.classList.remove('view-active');

            // Show the table of contents and last-changed divs
            document.getElementById('inhaltsverzeichnis').style.display = 'block';
            document.getElementById('last-changed').style.display = 'block';

            // Show all sections
            for (var i = 0; i < sectionIds.length; i++) {
                document.getElementById(sectionIds[i]).style.display = 'block';
            }

            // Hide the navigation buttons and reset the title
            document.querySelector('.single-view-navigation').style.display = 'none';
            document.querySelector('.single-view-title').textContent = '';

            // Remove active link
            removeActiveLink();

            // Update the hash fragment
            location.hash = '';
        });

        // Add click event listeners to the switch buttons
        var switchSingle = document.getElementById('switch-single');
        var switchFull = document.getElementById('switch-full');
        switchSingle.addEventListener('click', function(event) {
            var parentDiv = this.parentNode;
            if (!parentDiv.classList.contains('view-active')) {
                var activeDiv = document.querySelector('.view-active');
                if (activeDiv) {
                    activeDiv.classList.remove('view-active');
                }
                parentDiv.classList.add('view-active');
            }
            event.preventDefault();
        });
        switchFull.addEventListener('click', function(event) {
            var parentDiv = this.parentNode;
            if (!parentDiv.classList.contains('view-active')) {
                var activeDiv = document.querySelector('.view-active');
                if (activeDiv) {
                    activeDiv.classList.remove('view-active');
                }
                parentDiv.classList.add('view-active');
            }
            event.preventDefault();
        });


        // Add event listener to the page load event
        window.addEventListener('load', function() {
            // Parse the hash fragment
            var hash = location.hash.slice(1);
            if (hash.startsWith('single-view:')) {
                var sectionId = hash.slice('single-view:'.length);
                var sectionIndex = sectionIds.indexOf(sectionId);
                if (sectionIndex >= 0) {
                    // Set the view mode to single-view and show the specified section
                    var currentSection = document.getElementById(sectionId);
                    if (currentSection) { // Check if the specified section exists
                        currentSection.style.display = 'block';
                        if (currentSection != "s-p-1") {
                            document.getElementById('s-p-1').style.display = 'none';
                        }
                        currentSectionIndex = sectionIndex; // Set the currentSectionIndex variable
                        document.querySelector('.single-view-title').textContent = currentSection.querySelector('h6').textContent;
                    }
                }
                document.getElementById('switch-single').click();
                updateActiveLink(hash);
            }
        });



        function navigateToSection(sectionId) {
            var singleViewButton = document.getElementById('switch-single');

            if (singleViewButton.parentNode.classList.contains('view-active')) {
                // If the page is in single-view mode, hide all sections except the clicked section
                for (var i = 0; i < sectionIds.length; i++) {
                    var section = document.getElementById(sectionIds[i]);
                    if (section.id === sectionId) {
                        section.style.display = 'block';
                        document.querySelector('.single-view-title').textContent = section.querySelector('h6').textContent;
                        currentSectionIndex = i;
                        currentSection = section; // Set the current section variable to the new section element
                    } else {
                        section.style.display = 'none';
                    }
                }
                // Update currentSectionIndex to the index of the current section
                currentSectionIndex = sectionIds.indexOf(sectionId);
                // Update the hash fragment and the active link
                var hash = 'single-view:' + sectionId;
                location.hash = hash;
                updateActiveLink(hash);
            } else {
                // If the page is not in single-view mode, do nothing
                return;
            }
        }




        function updateActiveLink(hash) {
            var links = document.getElementsByClassName('law-sidelink');
            for (var i = 0; i < links.length; i++) {
                var link = links[i];
                var sectionId = link.getAttribute('href').substring(1);
                if (sectionId === sectionIds[currentSectionIndex]) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
                if (link.parentNode.id === 'law-sidenav') {
                    var linkHash = '';
                    if (document.querySelector('.view-active')) {
                        linkHash = ':single-view';
                        // Update the hash fragment only if in single-view mode
                        location.hash = sectionId + linkHash;
                    }
                    link.setAttribute('href', '#' + sectionId + linkHash);
                }
            }
        }

        function removeActiveLink() {
            var links = document.getElementsByClassName('law-sidelink');
            for (var i = 0; i < links.length; i++) {
                var link = links[i];
                link.classList.remove('active');
            }
        }

        window.addEventListener('hashchange', function() {
            var hash = location.hash.slice(1);
            if (hash.startsWith('single-view:')) {
                currentSectionId = hash.slice('single-view:'.length);
                updateActiveLink();
            }
        });
    </script>
</body>

</html>