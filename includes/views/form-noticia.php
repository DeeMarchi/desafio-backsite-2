<section class="text-center">
    <h2>Crie sua notícia</h2>
    <form action="/" method="POST">
        <div class="p-2">
            <div class="mb-1">
                <label class="d-block" for="titulo">Titulo da noticia</label>
                <input type="text" id="titulo" name="titulo" 
                    aria-label="Título" placeholder="Título" required>
            </div>
            <div class="mb-1">
                <label class="d-block" for="descricao">Descrição</label>
                <input type="text" id="descricao" name="descricao" 
                    aria-label="Descrição" placeholder="Descrição" required>
            </div>
            <div class="mb-1">
                <label class="d-block" for="conteudo">Conteudo</label>
                <textarea name="conteudo" id="conteudo" 
                    aria-label="Conteúdo" placeholder="Conteúdo"
                    rows="5" required></textarea>
            </div>
            <div>
                <label class="d-block" for="tags">Tags</label>
                <input type="text" id="tags" name="tags" 
                    aria-label="Tags" placeholder="Tags" required>
            </div>
        </div>
        <button type="submit">Enviar</button>
    </form>
</section>