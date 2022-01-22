import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  title: string = 'B2B frontend';

  constructor() { }

  ngOnInit(): void {
  }

  toggleAddReward() {
    console.log('toggle')
  }

}
