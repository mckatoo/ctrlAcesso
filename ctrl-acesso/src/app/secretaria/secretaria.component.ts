import { Component, OnInit } from '@angular/core';
import { FirebaseListObservable, AngularFireDatabase } from 'angularfire2/database';
import { Title } from '@angular/platform-browser';
import { SecretariaEditComponent } from './../modal/secretaria-edit/secretaria-edit.component';

@Component({
  selector: 'secretaria',
  templateUrl: './secretaria.component.html',
  styleUrls: ['./secretaria.component.scss']
})
export class SecretariaComponent implements OnInit {
  alunos: FirebaseListObservable<any>;
  text: string = '';
  editAluno: FirebaseListObservable<any>;

  constructor(private db: AngularFireDatabase, private title: Title) {
    this.alunos = db.list('/alunos');
  }

  trocar(str:string, rgx, por:string=""){
    return str.replace(rgx,por);
  }

  importCSV(e) {
    var fileName = e.target.files[0];
    console.log(fileName);
    if (!fileName) {
      return;
    }
    var reader = new FileReader();

    reader.onload = file => {
      // let str : string = encodeURI(encodeURIComponent(reader.result));
      let str = encodeURI(reader.result);
      str = this.trocar(str,/;/gi);
      str = this.trocar(str,/%0D%0A/gi,'\n');
      str = this.trocar(str,/%20/gi,' ');
      str = this.trocar(str,/%22/gi,'"');
      str = this.trocar(str,/%EF%BF%BD%EF%BF%BDo/gi,'ção');
      this.text = str;
      console.log(this.text);
    }

    reader.readAsText(fileName);
    
  }

  save(json) {
    this.alunos.push(json);
  }
  
  editar(aluno){
    this.editAluno = aluno;
    console.log(aluno);
  }

  update(key: string, json: any) {
    this.alunos.update(key, json);
  }
  
  delete(key: string) {
    if (key == 'undefined') {
      this.alunos.remove();
    } else {
      this.alunos.remove(key); 
    }
  }

  ngOnInit() {
    this.title.setTitle('IESI - Secretaria');
  }

}
