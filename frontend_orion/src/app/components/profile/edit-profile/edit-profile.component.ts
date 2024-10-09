// src/app/components/profile/edit-profile/edit-profile.component.ts
import { Component, OnInit } from '@angular/core';
import { ProfileService } from '../../../services/profile.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-edit-profile',
  templateUrl: './edit-profile.component.html',
  styleUrls: ['./edit-profile.component.css'],
})
export class EditProfileComponent implements OnInit {
  user: any = {};
  updatedData: any = {};

  constructor(private profileService: ProfileService, private router: Router) {}

  ngOnInit(): void {
    this.profileService.getProfile().subscribe(
      (data) => {
        this.user = data;
        this.updatedData = { name: this.user.name, email: this.user.email };
      },
      (error) => {
        console.error('Error al obtener el perfil', error);
      }
    );
  }

  updateProfile(): void {
    this.profileService.updateProfile(this.updatedData).subscribe(
      (response) => {
        console.log(response.message);
        this.router.navigate(['/profile']);
      },
      (error) => {
        console.error('Error al actualizar el perfil', error);
      }
    );
  }
}
