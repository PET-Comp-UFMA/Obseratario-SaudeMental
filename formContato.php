<section id="envio-mensagem">
      <form action="./contato.php" method="post">
      <div class="mensagem">
        <div class="nome">
          <input type="text" name="nome" required="required" id="nome" placeholder="Nome:*" class="nome">
        </div>
        <div class="assunto">
          <input type="text" name="assunto" id="assunto" equired="required" placeholder="Assunto:" class="assunto">
        </div>
        <div class="telefone-email">
          <input type="email" name="email" required="required" id="nome" placeholder="Email:*" class="email">	
          <input type="tel"   name="phone" id="phone" placeholder="Telefone: " class="telefone">
        </div>
        <div class="texto-mensagem">
          <textarea name="mensagem" id="" placeholder="Mensagem: " class="textarea"></textarea>
        </div>
      </div>
    </section>
    <button type="submit">Enviar </button>
    </form>
  </main>