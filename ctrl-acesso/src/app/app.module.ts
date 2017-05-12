import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { SecretariaComponent } from './secretaria/secretaria.component';
import { ControleAcessoComponent } from './controle-acesso/controle-acesso.component';
import { RelatoriosComponent } from './relatorios/relatorios.component';
import { ConfiguracoesComponent } from './configuracoes/configuracoes.component';
import { PerfilComponent } from './perfil/perfil.component';

@NgModule({
  declarations: [
    AppComponent,
    SecretariaComponent,
    ControleAcessoComponent,
    RelatoriosComponent,
    ConfiguracoesComponent,
    PerfilComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
