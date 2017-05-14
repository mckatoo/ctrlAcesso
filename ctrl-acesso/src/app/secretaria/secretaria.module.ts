import { FirebaseModule } from './../firebase/firebase.module';
import { SecretariaComponent } from './secretaria.component';
import { SecretariaRoutingModule } from './secretaria-routing.module';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

@NgModule({
  imports: [
    CommonModule,
    FirebaseModule,
    SecretariaRoutingModule
  ],
  declarations: [
    SecretariaComponent
  ]
})
export class SecretariaModule { }
