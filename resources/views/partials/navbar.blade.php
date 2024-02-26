<nav class="navbar navbar-expand-lg bg-success"> 
    <div class="container">
      <a class="navbar-brand" href="/">Ajwa Premier</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "profil" ? 'active' : '') }}" href="/profil">PROFIL</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "agent" ? 'active' : '') }}" href="/agent">KEAGENAN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "jemaah" ? 'active' : '') }}" href="/jemaah">JEMAAH</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>