# Personal Bio Data & Resume Website

A simple multi-page personal website containing Bio Data and Resume built with semantic HTML5, modern CSS, and jQuery-enhanced interactions.

## Features
- Bio Data page (`index.html`) with structured details
- Resume page (`resume.html`) with collapsible sections (Experience, Projects)
- Responsive design (mobile navigation toggle)
- Dark/Light mode toggle with localStorage persistence
- Print/Save as PDF button on resume page (uses browser print)
- Accessible markup (ARIA attributes, focus styles)

## File Structure
```
assets/
  css/style.css      # Styles & dark mode
  js/script.js       # jQuery interactions
  img/               # Place your profile photo here
index.html           # Bio Data page
resume.html          # Resume page
README.md            # Documentation
```

## Customization Steps
1. Replace placeholder text: "Your Name", DOB, address, etc.
2. Update contact info (`index.html` & `resume.html`).
3. Add your real photo: place `profile-placeholder.png` or another image in `assets/img/` and update the `<img>` tag.
4. Fill authentic education details, percentages, CGPA.
5. Modify experience & projects sections with real items.
6. Adjust color palette in `:root` inside `assets/css/style.css` if desired.

## Dark Mode
Implemented using `[data-theme]` attribute on `<body>`. Toggle button switches and stores preference in `localStorage`.

## Collapsible Sections
Buttons with `aria-expanded` update state and hide/show content with `hidden` attribute for accessibility.

## Printing Resume
Use the Print / Save as PDF button on the Resume page. Print stylesheet hides navigation and extra UI elements automatically.

## Git & GitHub Setup (Windows PowerShell)
Run these commands inside the project folder (`f:\WEB ASSIGNMENT`). Replace `YOUR_GITHUB_USERNAME` and repository name.

```powershell
# Initialize repository
git init

# Create a .gitignore (optional)
@"
# Ignore OS cruft
Thumbs.db
.DS_Store

# Node / tooling caches (if added later)
node_modules/
.dist/
"@ | Out-File -Encoding UTF8 .gitignore

# Stage files
git add .

# Commit initial version
git commit -m "Initial commit: bio data & resume site"

# Add remote (create empty repo on GitHub first)
git remote add origin https://github.com/YOUR_GITHUB_USERNAME/REPO_NAME.git

# Push main branch
git branch -M main
git push -u origin main
```

## Enable GitHub Pages
1. Go to your GitHub repository Settings > Pages.
2. Select branch: `main` and folder: `/ (root)` then Save.
3. After a few minutes, site will be live at:
   `https://YOUR_GITHUB_USERNAME.github.io/REPO_NAME/`

## Optional Enhancements
- Add a contact form (requires backend or service like Formspree).
- Integrate a JSON file to populate resume dynamically.
- Add basic accessibility audit (Lighthouse).
- Include more interactive components (skill filtering, progress bars).

## License
Personal project — feel free to adapt for your own use.

## Checklist Before Submission
- [ ] All placeholder values replaced
- [ ] Photo added
- [ ] Contact info correct
- [ ] Spelling checked
- [ ] GitHub Pages published & URL captured

Enjoy building! 🚀
