<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Liste des livres</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="min-h-screen bg-slate-100 p-10">
        <div class="max-w-7xl mx-auto">
            
            <!-- En-tête avec le titre et le bouton personnalisé -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
                <h2 class="text-2xl font-bold tracking-tight text-slate-900">Liste des Livres (total: <?= count($books) ?>)</h2>
                
                <!-- Bouton personnalisé traduit en Tailwind -->
                <a href="add" class="relative inline-block px-8 py-3.5 text-[15px] font-bold text-[#131313] bg-[#ecd448] border-2 border-white rounded-[12px] shadow-[0_2px_0_2px_#000] overflow-hidden cursor-pointer transition-all duration-300 hover:bg-[#4cc9f0] hover:text-white hover:shadow-[0_2px_0_2px_#0d3b66] active:scale-90 group">
                    <!-- Bande orange animée -->
                    <span class="absolute top-1/2 left-0 w-[100px] h-[120%] bg-[#ff6700] -translate-x-[150%] -translate-y-1/2 skew-x-[30deg] transition-all duration-500 group-hover:translate-x-[150%] group-hover:transition-delay-100 pointer-events-none"></span>
                    <!-- Texte du bouton -->
                    <span class="relative z-10 flex items-center gap-2">
                        <span>+</span> Ajouter un livre
                    </span>
                </a>
            </div>

            <!-- Grille de cartes -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php 
                $colors = ['bg-orange-500', 'bg-teal-500', 'bg-purple-500', 'bg-indigo-600', 'bg-blue-600'];
                $i = 0;
                foreach ($books as $book): 
                    if(empty($book['deleted_at'])):
                    $bgColor = $colors[$i % count($colors)];
                    $textColor = str_replace('bg-', 'text-', $bgColor);
                    $i++;
                ?>
                    <!-- Carte principale -->
                    <div class="relative overflow-hidden <?= $bgColor ?> rounded-3xl shadow-xl flex flex-col justify-between p-6 h-[420px]">
                        
                        <!-- Formes géométriques en arrière-plan (style HyperUI) -->
                        <svg class="absolute bottom-0 left-0 mb-8 pointer-events-none" viewBox="0 0 375 283" fill="none" style="transform: scale(1.5); opacity: 0.1;">
                            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white"/>
                            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white"/>
                        </svg>

                        <!-- Boutons Modifier (crayon) et Supprimer (croix) en haut à droite -->
                        <div class="absolute top-4 right-4 z-25 flex items-center gap-2">
                            <!-- Bouton Modifier (Crayon) -->
                            <a href="update/<?= $book['book_id'] ?>" class="w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-md flex items-center justify-center text-white text-xs transition" title="Modifier">
                                <img src="/Bachelor/TP_2/assets/img/pencil.png" alt="Modifier" class="w-4 h-4 object-contain filter brightness-0 invert">
                            </a>

                            <!-- Bouton Supprimer (Croix) -->
                            <a href="delete/<?= $book['book_id'] ?>" class="w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-md flex items-center justify-center text-white text-xs transition" title="Supprimer">
                                ✕
                            </a>
                        </div>

                        <!-- Badge Disponible en haut à gauche -->
                        <div class="absolute top-4 left-4 z-20">
                            <span class="bg-white/30 backdrop-blur-md text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider">
                                <?= $book['is_available'] ? 'Disponible' : 'Indisponible' ?>
                            </span>
                        </div>

                        <!-- ZONE IMAGE : Agrandie au maximum, sans fond blanc -->
                        <div class="relative flex-1 flex items-center justify-center mt-4 z-10">
                            <?php if (!empty($book['imageMedia'])): ?>
                                <!-- w-44 et h-64 forcent une grande taille, object-cover remplit le cadre -->
                                <img class="w-44 h-64 object-cover rounded-2xl drop-shadow-[0_20px_20px_rgba(0,0,0,0.4)] transition-transform duration-300 hover:scale-105" 
                                    src="../assets/img/<?= htmlspecialchars($book['imageMedia']) ?>" 
                                    alt="<?= htmlspecialchars($book['title']) ?>">
                            <?php else: ?>
                                <div class="w-44 h-64 rounded-2xl bg-white/20 backdrop-blur-md border border-white/30 flex items-center justify-center text-5xl shadow-2xl">
                                    📖
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- TEXTES ET INFORMATIONS DU BAS -->
                        <div class="relative text-white z-10 mt-4">
                            <div class="flex justify-between items-end">
                                <div>
                                    <h4 class="font-bold text-xl leading-tight truncate max-w-[210px]"><?= htmlspecialchars($book['title']) ?></h4>
                                    <p class="text-xs opacity-90 mt-0.5">Auteur : <?= htmlspecialchars($book['author']) ?></p>
                                </div>
                                <!-- Badge du nombre de pages -->
                                <span class="bg-white rounded-full <?= $textColor ?> text-xs font-bold px-3.5 py-2 shadow-md whitespace-nowrap">
                                    <?= $book['page_number'] ?> p.
                                </span>
                            </div>
                        </div>

                    </div>
                <?php 
                endif;
            endforeach; 
                    
                ?>
            </div>

        </div>
    </body>
</html>