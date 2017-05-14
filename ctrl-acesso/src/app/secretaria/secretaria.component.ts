import { Component, OnInit } from '@angular/core';
import { FirebaseListObservable, FirebaseObjectObservable, AngularFireDatabase } from 'angularfire2/database';

@Component({
  selector: 'secretaria',
  templateUrl: './secretaria.component.html',
  styleUrls: ['./secretaria.component.scss']
})
export class SecretariaComponent implements OnInit {
  lista: FirebaseListObservable<any>;
  constructor(db: AngularFireDatabase) {
    this.lista = db.list('/teste');
  }
  save() {
    this.lista.push({
      "matricula": "31010004709",
      "nome": "TEFDSJDFKL ASLKDJF SDLFJ SDSDF",
      "campus": "IESI",
      "curso": "13901-IESI-SP - ASDFSDF FD BANISMO",
      "turma": "FSDFD545-3101",
      "aceite_contrato": "18/02/2016"
    });
  }
  update(key: string, json: any) {
    this.lista.update(key, json);
  }
  deleteItem(key: string) {    
    this.lista.remove(key); 
  }
  deleteEverything() {
    this.lista.remove();
  }

  ngOnInit() {
  }

}
