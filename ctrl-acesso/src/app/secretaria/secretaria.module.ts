import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './../app.component';
import { SecretariaComponent } from './secretaria.component';
import { SecretariaRoutingModule } from './secretaria-routing.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

@NgModule({
  imports: [
    CommonModule,
    SecretariaRoutingModule,
    BrowserModule,
	  FormsModule
  ],
  declarations: [
    SecretariaComponent
  ]
})
export class SecretariaModule {}
