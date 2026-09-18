<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bibliothèque de films</title>
        <!-- Intégration de Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-slate-100 min-h-screen p-10">
        <div class="max-w-7xl mx-auto">
            
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-slate-900">Liste des Films</h1>
                <a href="/Bachelor/TP_2/Movie/add" class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow-md transition">
                    + Ajouter un film
                </a>
            </div>

            <!-- Grille des films -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php if (!empty($movies)): ?>
                    <?php foreach ($movies as $movie): ?>
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden relative flex flex-col">
                            
                            <!-- Boutons Modifier (crayon) et Supprimer (croix) en haut à droite -->
                            <div class="absolute top-4 right-4 z-20 flex items-center gap-2">
                                <a href="/Bachelor/TP_2/Movie/update/<?= $movie['movie_id'] ?>" class="w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-md flex items-center justify-center text-white text-xs transition" title="Modifier">
                                    ✎
                                </a>
                                <a href="/Bachelor/TP_2/Movie/delete/<?= $movie['movie_id'] ?>" class="w-8 h-8 rounded-full bg-black/20 hover:bg-black/40 backdrop-blur-md flex items-center justify-center text-white text-xs transition" title="Supprimer">
                                    ✕
                                </a>
                            </div>

                            <!-- Image du film -->
                            <div class="h-64 bg-slate-200 overflow-hidden">
                                <img src="/Bachelor/TP_2/assets/img/<?= htmlspecialchars($movie['imageMedia'] ?? 'default.jpg') ?>" alt="<?= htmlspecialchars($movie['title']) ?>" class="w-full h-full object-cover">
                            </div>

                            <!-- Informations -->
                            <div class="p-5 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 mb-1"><?= htmlspecialchars($movie['title']) ?></h3>
                                    <p class="text-sm text-slate-600 mb-2">Réalisateur : <?= htmlspecialchars($movie['author']) ?></p>
                                    <p class="text-sm text-slate-500 mb-1">Durée : <?= htmlspecialchars($movie['duration']) ?>h</p>
                                    <p class="text-sm text-indigo-600 font-semibold mb-3">Genre : <?= htmlspecialchars($movie['genre']) ?></p>
                                </div>

                                <div>
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full <?= ($movie['is_available'] == 1) ? 'bg-emerald-100 text-emerald-800' : 'bg-red-100 text-red-800' ?>">
                                        <?= ($movie['is_available'] == 1) ? 'Disponible' : 'Indisponible' ?>
                                    </span>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-slate-500 col-span-full text-center py-10">Aucun film trouvé dans la bibliothèque.</p>
                <?php endif; ?>
            </div>

        </div>
    </body>
</html>