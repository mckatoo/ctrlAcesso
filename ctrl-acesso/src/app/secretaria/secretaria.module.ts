import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent } from './../app.component';
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SecretariaComponent } from './secretaria.component';
import { SecretariaRoutingModule } from './secretaria-routing.module';
import { LengthPipe } from './../shared/pipe/lenght/length.pipe';
import { PaginatePipe } from './../shared/pipe/paginate/paginate.pipe';

@NgModule({
  imports: [
    CommonModule,
    SecretariaRoutingModule,
    BrowserModule,
	  FormsModule
  ],
  declarations: [
    SecretariaComponent,
    LengthPipe,
    PaginatePipe
  ]
})
export class SecretariaModule {}
